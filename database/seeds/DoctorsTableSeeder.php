<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\User;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = config('doctor');

        foreach ($doctors as $doctor) {
            $new_doctor = new Doctor();
            $userCount = User::count();
            $new_doctor->user_id = rand(1,$userCount);
            $new_doctor->name = $doctor['name'];
            $new_doctor->surname = $doctor['surname'];
            $new_doctor->address = $doctor['address'];
            $new_doctor->city = $doctor['city'];
            $new_doctor->telephone = $doctor['telephone'];
            $new_doctor->photo = $doctor['photo'];
            $new_doctor->cv = $doctor['cv'];
            $new_doctor->save();

        }
    }
}
