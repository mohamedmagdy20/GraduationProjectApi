<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\PermissionTableSeeder;
use App\Models\Doctor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(RoleTableSeeder::class);
        // $this->call(UserTableSeeder::class);
        // $this->call(PermissionTableSeeder::class);
        // $this->call(TimesSeed::class);
        // $this->call(CategorySeed::class);
        $this->call(PaymentMethodSeeder::class);

        // \App\Models\Patient::factory()->count(50)->create(); 
    }
}
