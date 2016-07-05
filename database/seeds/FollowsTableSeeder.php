<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
               
        for ($i = 0; $i < 200; $i++){
            DB::table('follows')->insert([
                'user_id'     => rand(1, 20),
                'business_id' => rand(1, 20),
                'created_at'  => Carbon\Carbon::now()
            ]);
        }
    }
}
