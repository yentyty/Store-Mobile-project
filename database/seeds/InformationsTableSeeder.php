<?php

use Illuminate\Database\Seeder;
use App\Models\Information;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Information::class, 4)->create();
    }
}
