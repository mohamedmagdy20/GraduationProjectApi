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
        ]
        ];
        
        foreach($data as $d)
        {
            Permission::create($d);
        }
    }
}
