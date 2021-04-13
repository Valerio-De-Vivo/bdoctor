<?php

use Illuminate\Database\Seeder;
use App\Review;
use App\Doctor;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 

            $voto = rand(1,5);
            $new_review = new Review();

            $doctorCount = Doctor::count();
            $new_review->doctor_id = rand(1,$doctorCount);

            $new_review->name_user = 'pippo'.$i;
            $new_review->surname_user = 'pluto'.$i;
            $new_review->vote_user =  $voto;
            $new_review->review_user = 'lorem ipsum bla bla bla';
            $new_review->save();
        }
    }
}
