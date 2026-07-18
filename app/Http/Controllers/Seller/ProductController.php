<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shop;
use App\Models\ProductApprovalLog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Find the store owned by this seller
        $shop = Shop::where('user_id', $request->user()->id)->firstOrFail();

        $products = Product::where('shop_id', $shop->id)
            ->with(['category', 'variants'])
            ->latest()
            ->paginate(15);

        return Inertia::render('Seller/Products/Index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        // Pass categories to Vue so the seller can select one
        $categories = Category::where('is_active', true)->get();

        return Inertia::render('Seller/Products/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // Basic validation for the catalog
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'variants' => 'required|array|min:1',
            'variants.*.sku' => 'required|string|unique:product_variants,sku',
            'variants.*.price' => 'required|numeric|min:0',
        ]);

        $shop = Shop::where('user_id', $request->user()->id)->firstOrFail();

        // Use a database transaction so if one thing fails, everything rolls back
        DB::transaction(function () use ($request, $shop) {

            // 1. Create Product (Defaults to pending_review)
            $product = Product::create([
                'shop_id' => $shop->id,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name) . '-' . uniqid(),
                'description' => $request->description,
                'short_description' => Str::limit($request->description, 150),
                'status' => 'pending_review',
            ]);

            // 2. Create Product Variants
            foreach ($request->variants as $variant) {
                $product->variants()->create([
                    'sku' => $variant['sku'],
                    'price' => $variant['price'],
                    'is_active' => true,
                ]);
            }

            // 3. Write to the Immutable Audit Log
            ProductApprovalLog::create([
                'product_id' => $product->id,
                'action' => 'submitted',
                'notes' => 'Product created and submitted for admin review.',
            ]);
        });

        return redirect()->route('seller.products.index')
            ->with('success', 'Product submitted for review successfully!');
    }
}
