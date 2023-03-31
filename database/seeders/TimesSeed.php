<?php

namespace Database\Seeders;

use App\Models\AppointmentTime;
use Illuminate\Database\Seeder;

class TimesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
        $data =[
                 [
                     'time_from'=>'9-AM',
                     'time_to'=>'11-AM',
                 ],
                 [
                     'time_from'=>'11.30-Am',
                     'time_to'=>'1.30-PM'
                 ],
                 [
                     'time_from'=>'2-PM',
                     'time_to'=>'4-PM'
                 ],
                 [
                     'time_from'=>'4.30-PM',
                     'time_to'=>'6.30-PM'
                 ],
                 [
                     'time_from'=>'7-PM',
                     'time_to'=>'9-PM'
                 ],
                 [
                     'time_from'=>'9.30-PM',
                     'time_to'=>'11.30-PM'
                 ],
                 [
                     'time_from'=>'12-AM',
                     'time_to'=>'2-AM'
                 ]
            ];
        foreach($data as $d)
        {
            AppointmentTime::create($d);
        }
        
    }
}
