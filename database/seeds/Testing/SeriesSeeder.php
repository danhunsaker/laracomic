<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Series;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Series::create(['title' => 'Walnuts!', 'description' => 'Simply a test...']);
    }
}
