<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Category;
use App\Series;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'series_id' => Series::where(['route' => 'walnuts'])->first()->id,
            'parent_id' => Category::create([
                'series_id' => Series::where(['route' => 'walnuts'])->first()->id,
                'parent_id' => null,
                'name' => 'Main Category',
                'description' => 'A top-level category for this series...',
            ])->id,
            'name' => 'Secondary Category',
            'description' => 'A category within the Main Category',
        ]);
    }
}
