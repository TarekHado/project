<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
            'client-list',
            'client-delete',
            'contacts-list',
            'donationRequests-list',
            'donationRequests-delete',
            'governorate-list',
            'governorate-create',
            'governorate-edit',
            'governorate-delete',
            'posts-list',
            'posts-create',
            'posts-edit',
            'posts-delete',
            'settings-list',
            'settings-create'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
