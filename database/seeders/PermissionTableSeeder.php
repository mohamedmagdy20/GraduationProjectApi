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
           'display_name'=>'Show Admins',
           'description'=>'عرض المشرفين'
        ],
        [
           'name'=>'add_admins',
           'display_name'=>'Add Admins',
           'description'=>'اضافه المشرفين'
        ],
        [
           'name'=>'edit_admins',
           'display_name'=>'Edit Admins',
           'description'=>'تعديل المشرفين'
        ],
        [
           'name'=>'delete_admins',
           'display_name'=>'Delete Admins',
           'description'=>'حذف المشرفين'
        ],
        [
         'name'=>'show_permissions',
         'display_name'=>'Show Permissions',
         'description'=>'عرض الصلاحيات'
        ],
        [
         'name'=>'edit_permissions',
         'display_name'=>'edit Permissions',
         'description'=>'تعديل الصلاحيات'
        ],
        
        [
         'name'=>'show_doctors',
         'display_name'=>'Show Doctors',
         'description'=>'عرض الدكاتره'
        ],
        
        [
         'name'=>'add_doctors',
         'display_name'=>'Add Doctors',
         'description'=>'اضافه الاطباء'
        ],
        [
         'name'=>'delete_doctors',
         'display_name'=>'delete Doctors',
         'description'=>'حذف الاطباء'
        ],
        [
         'name'=>'show_patients',
         'display_name'=>'Show Patients',
         'description'=>'عرض المرضي'
     
        ],
        
        [
         'name'=>'active_patients',
         'display_name'=>'Active Patients',
         'description'=>'تفعيل المريض'
    
        ],
        [
         'name'=>'dective_patients',
         'display_name'=>'Dective Patients',
         'description'=>'تفعيل المريض'
  
        ],
        [
         'name'=>'show_categories',
         'display_name'=>'Show Categories',
         'description'=>'عرض الفئات'

        ],
        [
         'name'=>'add_categories',
         'display_name'=>'Add Categories',
         'description'=>'اضافه الفئات'

        ],
        [
            'name'=>'edit_categories',
            'display_name'=>'Edit Categories',
            'description'=>'تعديل الفئات'

        ],
        [
         'name'=>'delete_categories',
         'display_name'=>'Delete Categories',
         'description'=>'حذف الفئات'
        ],


        [
            'name'=>'show_classifiation_request',
            'display_name'=>'Show Classification Request',
            'description'=>'عرض تحديد نوع المرض'
        ],


        [
            'name'=>'make_classification_reqeust',
            'display_name'=>'Make Classification Requests',
            'description'=>'عمل تحديد الفئه'
        ],



        [
            'name'=>'show_result',
            'display_name'=>'Show Results',
            'description'=>'عرض النتائج'
        ],

        [
            'name'=>'show_invoices',
            'display_name'=>'Show Invoices',
            'description'=>'عرض الفواتير'
        ],
        [
            'name'=>'show_notifications',
            'display_name'=>'Show Notifications',
            'description'=>'عرض الاشعارات'
        ],

        
        [
            'name'=>'show_security',
            'display_name'=>'Show Security',
            'description'=>'عرض والجزء الامن'
        ],

        [
            'name'=>'show_appointment_time',
            'display_name'=>'Show Appointment Time',
            'description'=>'عرض الدكاتره'
           ],
           
           [
            'name'=>'add_appointment_time',
            'display_name'=>'Add Appointment Time',
            'description'=>'اضافه الاطباء'
           ],
     
           [
            'name'=>'edit_appointment_time',
            'display_name'=>'Edit Appointment Time',
            'description'=>'اضافه الاطباء'
           ],
           [
            'name'=>'delete_appointment_time',
            'display_name'=>'Delete Appointment Time',
            'description'=>'حذف الاطباء'
           ],
         
        ];
        
        foreach($data as $d)
        {
            Permission::create($d);
        }
    }
}
