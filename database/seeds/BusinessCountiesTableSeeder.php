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
                for($i = 0; $i < 10; $i++)
                {
                    DB::table('business_counties')->insert([
                        'business_id'  => 1,
                        'county_id'    => 1,
                        'created_at' => Carbon\Carbon::now()
                    ]);
                }
    }
}
