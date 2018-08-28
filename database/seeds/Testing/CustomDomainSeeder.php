<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\CustomDomain;
use App\Series;

class CustomDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomDomain::create(['domain' => 'walnuts.local', 'series_id' => Series::where(['route' => 'walnuts'])->first()->id]);
    }
}
