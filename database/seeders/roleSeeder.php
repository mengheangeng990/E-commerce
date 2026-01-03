<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin role with all permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $adminPermissions = Permission::whereIn('name', [
            'users.manage',
            'products.create',
            'products.update',
            'products.delete',
            'category.create',
            'category.update',
            'category.delete',
        ])->pluck('id');
        $admin->permissions()->sync($adminPermissions);

        // Create manager role with product and category permissions
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $managerPermissions = Permission::whereIn('name', [
            'products.create',
            'products.update',
            'products.delete',
            'category.create',
            'category.update',
            'category.delete',
        ])->pluck('id');
        $manager->permissions()->sync($managerPermissions);

        // Create staff role with limited permissions
        $staff = Role::firstOrCreate(['name' => 'staff']);
        $staffPermissions = Permission::whereIn('name', [
            'products.create',
            'category.create',
        ])->pluck('id');
        $staff->permissions()->sync($staffPermissions);
    }
}
