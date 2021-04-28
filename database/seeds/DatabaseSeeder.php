<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(PerformanceSeeder::class);
        $this->call(AdvertiseSeeder::class);
        $this->call(PlanSeeder::class);
    }
}
