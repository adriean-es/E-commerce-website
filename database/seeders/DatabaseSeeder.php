<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RbacSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@sarisari.ph',
        ]);
        $admin->assignRole('admin');

        $vendor = User::factory()->create([
            'name' => 'Test Vendor',
            'email' => 'vendor@sarisari.ph',
        ]);
        $vendor->assignRole('seller');

        // ---> NEW: Create a test shop for the seller
        \App\Models\Shop::create([
            'user_id' => $vendor->id,
            'name' => 'My Awesome Sari-Sari Store',
            'slug' => 'my-awesome-store',
            'status' => 'active',
        ]);

        // ---> NEW: Create a test category so you can select it in the form
        \App\Models\Category::create([
            'name' => 'Clothing',
            'slug' => 'clothing',
            'description' => 'Apparel and accessories',
        ]);


        $customer = User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@sarisari.ph',
        ]);
        $customer->assignRole('customer');
    }
}
