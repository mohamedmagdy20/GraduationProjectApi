<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
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
                'name'=>'Brain',
            ],
            [
                'name'=>'Alzhimer'
            ]
            ];
            foreach($data as $d)
            {
                Category::create($d);
            }
    }
}
