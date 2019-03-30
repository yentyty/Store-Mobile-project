<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(InformationsTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(IntroducesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(PromotionsTableSeeder::class);
        $this->call(FactoriesTableSeeder::class);
        $this->call(OffersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(BillDetailsTableSeeder::class);
    }
}
