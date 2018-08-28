<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\News;
use App\Series;
use App\User;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'series_id' => Series::where(['route' => 'walnuts'])->first()->id,
            'author_id' => User::where(['is_author' => true])->first()->id,
            'headline' => 'News Post?',
            'article' => 'Nope, just a test...',
        ]);
    }
}
