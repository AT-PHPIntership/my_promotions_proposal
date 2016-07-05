<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for ($i = 0; $i < 20; $i++){
            DB::table('admin_users')->insert([
                'name'       => $faker->name,
                'email'      => $faker->email,
                'password'   => bcrypt('123456'),
                'image'      => '',
                'address'    => $faker->address,
                'phone'      => $faker->phoneNumber,
                'created_at' => Carbon\Carbon::now()
            ]);
        }
    }
}
