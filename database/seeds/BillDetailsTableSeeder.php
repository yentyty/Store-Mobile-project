<?php

use Illuminate\Database\Seeder;
use App\Models\BillDetail;

class BillDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BillDetail::class, 5)->create();
    }
}
