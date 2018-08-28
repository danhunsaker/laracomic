<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Role;
use App\Series;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['title' => 'Creator', 'series_id' => Series::where(['route' => 'walnuts'])->first()->id]);
    }
}
