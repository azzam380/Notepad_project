<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crud admin
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'lihat-user']);
        Permission::create(['name' => 'hapus-user']);

        // crud penulis
        Permission::create(['name' => 'tambah-tulisan']);
        Permission::create(['name' => 'update-tulisan']);
        Permission::create(['name' => 'lihat-tulisan']);
        Permission::create(['name' => 'hapus-tulisan']);

        // buat role seputar crud
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'penulis']);

        // Buat role admin berkuasa atas permission
        $roleAdmin =  Role::findByName('admin');
        $roleAdmin->syncPermissions(Permission::all());

        // buat role penulis hanya punya hak utk ngakses crud tulisan saja
        $rolePenulis = Role::findByName('penulis');
        $rolePenulis->syncPermissions(['tambah-tulisan', 'update-tulisan', 'lihat-tulisan', 'hapus-tulisan']);
    }
}
