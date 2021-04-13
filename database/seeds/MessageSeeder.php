<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\Doctor;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            
            
            $new_message = new Message();

            $doctorCount = Doctor::count();
            $new_message->doctor_id = rand(1,$doctorCount);

            $new_message->name_user = 'pippo'.$i;
            $new_message->surname_user = 'pluto'.$i;
            $new_message->telephone_user =  '348657483'.$i;
            $new_message->message_user = 'lorem ipsum bla bla bla';
            $new_message->save();
        }
    }
}
