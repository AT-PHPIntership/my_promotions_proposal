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
       
        for($i = 0; $i < 200; $i++){
            DB::table('ratings')->insert([
                'content'      => $faker->realText(rand(10,20)),
                'score'        => rand(1, 5),
                'user_id'      => rand(1, 20),
                'promotion_id' => rand(1, 20),
                'created_at'   => Carbon\Carbon::now()
            ]);
        }
    }
}
