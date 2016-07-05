<?php

use Illuminate\Database\Seeder;

class BusinessCountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 20; $i++)
        {
            DB::table('business_counties')->insert([
                'business_id'  => rand(1, 20),
                'county_id'    => rand(1, 20),
                'created_at' => Carbon\Carbon::now()
            ]);
        }
    }
}
