<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            ['name' => 'view dashboard'],
            ['name' => 'create slider'],
            ['name' => 'view slider'],
            ['name' => 'edit slider'],
            ['name' => 'delete slider'],
            ['name' => 'create products'],
            ['name' => 'view products'],
            ['name' => 'edit products'],
            ['name' => 'delete products'],
            ['name' => 'create features'],
            ['name' => 'view features'],
            ['name' => 'edit features'],
            ['name' => 'delete features'],
            ['name' => 'create portfolio'],
            ['name' => 'view portfolio'],
            ['name' => 'edit portfolio'],
            ['name' => 'delete portfolio'],
            ['name' => 'create partner'],
            ['name' => 'view partner'],
            ['name' => 'edit partner'],
            ['name' => 'delete partner'],
            ['name' => 'create service'],
            ['name' => 'view service'],
            ['name' => 'edit service'],
            ['name' => 'delete service'],
            ['name' => 'create subscribers'],
            ['name' => 'view subscribers'],
            ['name' => 'edit subscribers'],
            ['name' => 'delete subscribers'],
            ['name' => 'create blogs'],
            ['name' => 'view blogs'],
            ['name' => 'edit blogs'],
            ['name' => 'delete blogs'],
            ['name' => 'create messages'],
            ['name' => 'view messages'],
            ['name' => 'edit messages'],
            ['name' => 'delete messages'],
            ['name' => 'create teams'],
            ['name' => 'view teams'],
            ['name' => 'edit teams'],
            ['name' => 'delete teams'],
            ['name' => 'create roles'],
            ['name' => 'view roles'],
            ['name' => 'edit roles'],
            ['name' => 'delete roles'],
            ['name' => 'create users'],
            ['name' => 'view users'],
            ['name' => 'edit users'],
            ['name' => 'delete users'],
            // ['name' => 'affiliate earnings'],
            ['name' => 'share links'],


        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions(Permission::all());
        $user = User::first();
        $user->assignRole($role);
        $affiliatePermissions = [
            ['name' => 'affiliate dashboard'],
            ['name' => 'affiliate service'],
        ];
        foreach ($affiliatePermissions as $affiliatePermission) {
            Permission::create($affiliatePermission);
        }
        $affiliated = Role::create(['name' => 'affiliated']);
        $affiliated->syncPermissions([
            'affiliate dashboard',
            'affiliate service'
        ]);
    }
}
