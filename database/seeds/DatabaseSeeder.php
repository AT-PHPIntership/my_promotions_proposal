<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CountiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BusinessesTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
        $this->call(BusinessCountiesTableSeeder::class);
        $this->call(BusinessCitiesTableSeeder::class);
        $this->call(PromotionsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
    }
}
