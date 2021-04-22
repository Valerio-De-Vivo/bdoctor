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
        for ($i=0; $i < 10; $i++) {


            $new_message = new Message();

            $doctorCount = Doctor::count();
            $new_message->doctor_id = rand(1,$doctorCount);

            $new_message->name_user = 'Mimmo'.$i;
            $new_message->surname_user = 'Marelli'.$i;
            $new_message->mail_user =  'mimmomarelli'.$i.'@gmail.com';
            $new_message->message_user = 'lorem ipsum bla bla bla';
            $new_message->save();
        }
    }
}
