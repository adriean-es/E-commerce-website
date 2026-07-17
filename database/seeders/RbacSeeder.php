<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RbacSeeder extends Seeder
{
    public function run(): void
    {
        // ── Roles ──────────────────────────────────────
        $admin    = Role::firstOrCreate(['name' => 'admin']);
        $vendor   = Role::firstOrCreate(['name' => 'vendor']);
        $customer = Role::firstOrCreate(['name' => 'customer']);

        // ── Permissions ────────────────────────────────
        $permissions = [
            // Admin
            'manage_users',
            'manage_roles',
            'manage_vendors',
            'manage_products',
            'manage_orders',
            'view_admin_dashboard',

            // Vendor
            'create_product',
            'edit_own_product',
            'delete_own_product',
            'view_own_orders',
            'view_vendor_dashboard',

            // Customer
            'browse_products',
            'add_to_cart',
            'place_order',
            'view_own_profile',
            'leave_review',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        // ── Assign Permissions to Roles ────────────────

        // Admin gets ALL permissions
        $admin->permissions()->sync(Permission::all()->pluck('id'));

        // Vendor gets vendor + customer permissions
        $vendorPerms = Permission::whereIn('name', [
            'create_product',
            'edit_own_product',
            'delete_own_product',
            'view_own_orders',
            'view_vendor_dashboard',
            'browse_products',
            'add_to_cart',
            'place_order',
            'view_own_profile',
            'leave_review',
        ])->pluck('id');
        $vendor->permissions()->sync($vendorPerms);

        // Customer gets basic permissions
        $customerPerms = Permission::whereIn('name', [
            'browse_products',
            'add_to_cart',
            'place_order',
            'view_own_profile',
            'leave_review',
        ])->pluck('id');
        $customer->permissions()->sync($customerPerms);

        $this->command->info('RBAC roles and permissions seeded successfully.');
    }
}
