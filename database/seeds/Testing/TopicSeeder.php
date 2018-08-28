<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Topic;
use App\Category;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'category_id' => Category::where(['route' => 'main-category'])->first()->id,
            'name' => 'A Topic',
            'description' => 'A forum topic!',
        ]);
        Topic::create([
            'category_id' => Category::where(['route' => 'secondary-category'])->first()->id,
            'name' => 'Another Topic?',
            'description' => 'A _second_ forum topic!',
        ]);
    }
}
