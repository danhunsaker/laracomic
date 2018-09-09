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
        $series = Series::create(['title' => 'Walnuts!', 'description' => 'Simply a test...'])->setStatus('public', 'seed data');

        $series->addMedia(__DIR__ . '/walnuts-logo.png')->preservingOriginal()->toMediaCollection('logo');
        $series->addMedia(__DIR__ . '/walnuts-can-control-appetite.jpg')->preservingOriginal()->toMediaCollection('banner');
    }
}
