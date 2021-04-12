<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('doctor');

        foreach ($users as $doctor) {
            $new_doctor = new User();
            $new_doctor->name = $doctor['name'];
            $new_doctor->email = $doctor['email'];
            $new_doctor->password = $doctor['password'];
            $new_doctor->remember_token = $doctor['remember_token'];
            $new_doctor->save();

        }
    }
}
