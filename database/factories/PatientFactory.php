<?php

namespace Database\Factories;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Patient::class;
    public function definition()
    {
        return [
            //
            'name'=>$this->faker->name('female'),
            'email'=>$this->faker->email(),
            'password'=>Hash::make(123),
            'phone'=>$this->faker->phoneNumber(),
            'gender'=>'female',
            'date_of_birth'=>Carbon::now(),
            'access_token'=>'{"access_token":"ya29.a0AWY7CklqOHecddCH-J9TVJckIl6KG7KGaNRUjEfDIeTfQGZEeueRH47CzZmZJ1BkfiHa_uHILLxuYtkkqDa6SPjaUiNhWaNtbp_2MrSSpDRpHYa24Q5gu5U5-V7_0jYdUw5doiIV4RAn6IAIQlTmXaVprdHPaCgYKAVsSARISFQG1tDrpjgrw8ElZow9vodqyWFwwsA0163","expires_in":3599,"refresh_token":"1\/\/03E4iPPQmIJG4CgYIARAAGAMSNwF-L9IrcndHr8yrPF0TeQPcsnYns_Tfl0_3mFRnGSA5zPZ63zV-7QHPgMRwZUKcXvxc1nTy36g","scope":"https:\/\/www.googleapis.com\/auth\/drive https:\/\/www.googleapis.com\/auth\/drive.file","token_type":"Bearer","created":1685204780}'
        ];
    }
}
