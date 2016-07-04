<?php

use Illuminate\Database\Seeder;

class BusinessCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
                for($i = 0; $i < 10; $i++)
                {
                    DB::table('business_cities')->insert([
                        'business_id'  => 1,
                        'city_id'      => 1,
                        'created_at' => Carbon\Carbon::now()
                    ]);
                }
    }
}
