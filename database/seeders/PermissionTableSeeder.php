<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permission = Permission::create([
            'name'=>'add_admin',
            'display_name'=>'Add Admins',   
        ],
        [
            'name'=>'edit_admin',
            'display_name'=>'Edit Admin',    
        ],
        [
            'name'=>'delete_admin',
            'display_name'=>'Delete Admin'
        ]);
    }
}
