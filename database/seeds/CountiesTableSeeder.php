<?php

use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
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
                    DB::table('counties')->insert([
                        'name'      => $faker->name,
                        'city_id'   => 1,
                        'created_at'=> Carbon\Carbon::now() 
                    ]);
                }
    }
}
