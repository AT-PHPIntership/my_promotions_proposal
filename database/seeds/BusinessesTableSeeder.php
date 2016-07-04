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
        for($i = 0; $i < 10; $i++)
        {
            DB::table('businesses')->insert([
                'name'          => $faker->name,
                'email'         => $faker->email,
                'phone'         => $faker->phoneNumber,
                'logo'          => '',
                'description'   => $faker->realText,
                'user_id'       => 1,
                'created_at'    => Carbon\Carbon::now()
            ]);
        }
    }
}
