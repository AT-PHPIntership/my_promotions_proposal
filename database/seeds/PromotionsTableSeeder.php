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
                for($i = 0; $i < 10; $i++)
                {
                    DB::table('promotions')->insert([
                        'title'      => $faker->name,
                        'intro'      => $faker->realText,
                        'content'    => $faker->realText,
                        'image'      => '',
                        'expired_day'=> Carbon\Carbon::now(),
                        'business_id'=> 1,
                        'category_id'=> rand(1,10),
                        'created_at' => Carbon\Carbon::now()
                    ]);
                }
    }
}
