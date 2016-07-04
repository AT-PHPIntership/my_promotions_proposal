<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
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
                    DB::table('ratings')->insert([
                        'content'    => $faker->realText,
                        'score'      => rand(1,5),
                        'user_id'    => 1,
                        'promotion_id'=> 1,
                        'created_at' => Carbon\Carbon::now()
                    ]);
                }
    }
}
