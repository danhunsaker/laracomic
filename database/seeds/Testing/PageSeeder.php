<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Page;
use App\Series;
use App\User;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'series_id' => Series::where(['route' => 'walnuts'])->first()->id,
            'author_id' => User::where(['is_author' => true])->first()->id,
            'title' => 'About',
            'content' => 'Yeah, just another test, here...',
        ]);
    }
}
