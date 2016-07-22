<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 20; $i++){
            DB::table('promotions')->insert([
                'title'      => $faker->name,
                'intro'      => $faker->realText(rand(20, 30)),
                'content'    => $faker->realText(rand(50, 70)),
                'image'      => '',
                'expired_day'=> Carbon\Carbon::now(),
                'business_id'=> rand(1, 20),
                'category_id'=> rand(1, 5),
                'created_at' => Carbon\Carbon::now()
            ]);
        }
    }
}
