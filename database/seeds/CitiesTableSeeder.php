<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
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
                    DB::table('cities')->insert([
                        'name'      => $faker->name,
                        'created_at' => Carbon\Carbon::now()
                    ]);
                }
    }
}
