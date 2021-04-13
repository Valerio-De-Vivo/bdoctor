<?php

use Illuminate\Database\Seeder;
use App\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 

            $specializzazioni = ['Ematologia' , 'Dermatologia' , 'Nefrologia', 'Chirurgia', 'Ortopedia', 'Neurochirurgia', 'Cardiochirurgia' ,'Radioterapia' , 'Farmacologia', 'Oncologia' , 'Pediatria' , 'Odontoiatria' , 'Ginecologia', 'Fisioterapia'];

            $new_specialization = new Specialization();
            $new_specialization->specialization = $specializzazioni[$i];
            $new_specialization->save();
        }
    }
}
