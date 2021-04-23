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

        $specializzazioni = ['Ematologia' , 'Dermatologia' , 'Nefrologia', 'Chirurgia', 'Ortopedia', 'Neurochirurgia', 'Cardiochirurgia' ,'Radioterapia' , 'Farmacologia', 'Oncologia' , 'Pediatria' , 'Odontoiatria' , 'Ginecologia', 'Fisioterapia'];

        foreach ($specializzazioni as $element) {
            $new_specialization = new Specialization();
            $new_specialization-> specialization = $element;

            $new_specialization->save();

        }
    }
}
