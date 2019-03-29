<?php

use Illuminate\Database\Seeder;
use App\Models\Bill;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bill::class, 5)->create();
    }
}
