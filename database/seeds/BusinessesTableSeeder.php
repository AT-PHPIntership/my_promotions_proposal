<?php

use Illuminate\Database\Seeder;

class BusinessesTableSeeder extends Seeder
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
            DB::table('businesses')->insert([
                'name'          => $faker->company,
                'email'         => $faker->email,
                'phone'         => $faker->phoneNumber,
                'logo'          => '',
                'description'   => $faker->realText,
                'user_id'       => rand(1, 20),
                'created_at'    => Carbon\Carbon::now()
            ]);
        }
    }
}
