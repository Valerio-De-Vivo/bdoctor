<?php

use Illuminate\Database\Seeder;
use App\Performance;


class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 

            $performance = ['Remoto' , 'Studio'] ;

            $new_performance = new Performance();
            $new_performance->performance = $performance[ rand(0,1) ];
            $new_performance->save();
        }
    }
}
