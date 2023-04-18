<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

use function Ramsey\Uuid\v1;

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
      //
      $data =[
        [
           'name'=>'show_admins',
           'display_name'=>'Show Admins'
        ],
        [
           'name'=>'add_admins',
           'display_name'=>'Add Admins'
        ],
        [
           'name'=>'edit_admins',
           'display_name'=>'Edit Admins'
        ],
        [
           'name'=>'delete_admins',
           'display_name'=>'Delete Admins'
        ],
        [
         'name'=>'show_permissions',
         'display_name'=>'Show Permissions'
        ],
        [
         'name'=>'edit_permissions',
         'display_name'=>'edit Permissions'
        ],
        
        [
         'name'=>'show_doctors',
         'display_name'=>'Show Doctors'
        ],
        
        [
         'name'=>'add_doctors',
         'display_name'=>'Add Doctors'
        ],
        [
         'name'=>'delete_doctors',
         'display_name'=>'delete Doctors'
        ],
        [
         'name'=>'show_patients',
         'display_name'=>'Show Patients'
        ],
        
        [
         'name'=>'active_patients',
         'display_name'=>'Active Patients'
        ],
        [
         'name'=>'dective_patients',
         'display_name'=>'Dective Patients'
        ],
        [
         'name'=>'show_categories',
         'display_name'=>'Show Categories'
        ],
        [
         'name'=>'add_categories',
         'display_name'=>'Add Categories'
        ],
        [
            'name'=>'edit_categories',
            'display_name'=>'Edit Categories'
        ],
        [
         'name'=>'delete_categories',
         'display_name'=>'Delete Categories'
        ],
     
        ];
        
        foreach($data as $d)
        {
            Permission::create($d);
        }
    }
}
