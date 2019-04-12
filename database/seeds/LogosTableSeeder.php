<?php

use Illuminate\Database\Seeder;
use App\Models\Logo;

class LogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Logo::class, 5)->create();
    }
}
