<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'Aakash Sharma', 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'approved_at' => now()
        ]);
    
        $role = Role::create(['guard_name' => 'admin','role' => 'Admin']);
     
        $permissions = Permission::create(['guard_name' => 'admin','permission' => 'administrator']);
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
