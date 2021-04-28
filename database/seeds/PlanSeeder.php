<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $plans = [
        [
            "name" => "Pacchetto STANDARD" ,
            "slug" => "standard",
            "stripe_plan" => "",
            "cost" => "2.99",
            "description" => "- 24h di visibilità massima"
        ],
        [
            "name" => "Pacchetto PREMIUM" ,
            "slug" => "premium",
            "stripe_plan" => "",
            "cost" => "5.99",
            "description" => "- 72h di visibilità massima"
        ],
        [
            "name" => "Pacchetto GOLD" ,
            "slug" => "gold",
            "stripe_plan" => "",
            "cost" => "9.99",
            "description" => "- 144h di visibilità massima"
        ]
      ];

      foreach ($plans as $plan) {
          $new_plan = new Plan();
          $new_plan->name = $plan['name'];
          $new_plan->slug = $plan['slug'];
          $new_plan->stripe_plan = $plan['stripe_plan'];
          $new_plan->cost = $plan['cost'];
          $new_plan->description = $plan['description'];
          $new_plan->save();
      }
    }
}
