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
        $vendor->assignRole('vendor');

        $customer = User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@sarisari.ph',
        ]);
        $customer->assignRole('customer');
    }
}
