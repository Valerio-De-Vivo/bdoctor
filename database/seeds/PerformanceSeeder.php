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

        $performance = ['Remoto' , 'Studio'] ;

        foreach ($performance as $element) {
            $new_performance = new Performance();
            $new_performance-> performance = $element;

            $new_performance->save();

        }
    }
}
