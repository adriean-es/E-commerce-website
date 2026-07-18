<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PurchaseOrder;
use App\Models\SupplierProfile;
use Illuminate\Support\Str;

class PurchaseOrderController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->shop;

        $purchaseOrders = PurchaseOrder::with(['supplier.user', 'creator'])
            ->where('shop_id', $shop->id)
            ->latest()
            ->get();

        return Inertia::render('Seller/PurchaseOrders/Index', [
            'purchaseOrders' => $purchaseOrders,
        ]);
    }

    public function create(Request $request)
    {
        $shop = $request->user()->shop;
        $suppliers = $shop->suppliers()->with('user')->get();

        // Grab the seller's variants so they can choose what to order
        $variants = \App\Models\ProductVariant::whereHas('product', function ($q) use ($shop) {
            $q->where('shop_id', $shop->id);
        })->with(['product', 'attributeValues'])->get();

        return Inertia::render('Seller/PurchaseOrders/Create', [
            'suppliers' => $suppliers,
            'variants' => $variants,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:supplier_profiles,id',
            'delivery_address' => 'required|string',
            'expected_delivery_date' => 'required|date|after_or_equal:today',
            'items' => 'required|array|min:1',
            'items.*.variant_id' => 'required|exists:product_variants,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_cost' => 'required|numeric|min:0',
        ]);

        $shop = $request->user()->shop;

        // Calculate totals
        $subtotal = 0;
        foreach ($request->items as $item) {
            $subtotal += ($item['quantity'] * $item['unit_cost']);
        }

        // Create PO
        $po = PurchaseOrder::create([
            'shop_id' => $shop->id,
            'supplier_id' => $request->supplier_id,
            'created_by' => $request->user()->id,
            'po_number' => 'PO-' . date('Y') . '-' . strtoupper(Str::random(5)),
            'status' => 'sent', // Skipping 'draft' to speed up testing
            'subtotal' => $subtotal,
            'total_amount' => $subtotal,
            'delivery_address' => $request->delivery_address,
            'expected_delivery_date' => $request->expected_delivery_date,
        ]);

        // Add Items
        foreach ($request->items as $item) {
            $po->items()->create([
                'product_variant_id' => $item['variant_id'],
                'quantity_ordered' => $item['quantity'],
                'unit_cost' => $item['unit_cost'],
                'total_cost' => $item['quantity'] * $item['unit_cost'],
            ]);
        }

        // Log Status
        $po->statusLogs()->create([
            'changed_by' => $request->user()->id,
            'from_status' => 'draft',
            'to_status' => 'sent',
            'notes' => 'PO created and sent to supplier.',
        ]);

        return redirect()->route('seller.purchase-orders.index')->with('success', 'Purchase Order sent successfully!');
    }
}
