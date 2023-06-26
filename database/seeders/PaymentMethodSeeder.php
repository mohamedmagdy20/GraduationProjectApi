<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
                [
                    'name'=>'manual',
                    'description'=>'Pay In Place'
                ],
                [
                    'name'=>'card',
                    'description'=>'Pay with Card Visa / Master Card',
                ],
                [
                    'name'=>'kosik',
                    'description'=>'Pay with Code',
                ]
        ];
        foreach($data as $d){
            PaymentMethod::create($d);
        }
       
    }
}
