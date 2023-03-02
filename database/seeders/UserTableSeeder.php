<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name'=>'Super Admin',
            'email'=>'superadmin@admin.com',
            'password'=>Hash::make(123456),
            'email_verified_at'=>time()
        ]);
        $user->attachRole('super_admin');
    }
}
