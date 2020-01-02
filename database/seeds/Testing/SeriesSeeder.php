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

        $series->addMedia(__DIR__ . '/media/walnuts/logo.png')->preservingOriginal()->toMediaCollection('logo');
        $series->addMedia(__DIR__ . '/media/walnuts/banner.jpg')->preservingOriginal()->toMediaCollection('banner');

        /*
         * Pepper & Carrot - by David Revoy
         */

        Authority::create([
            'authorables_id' => ($series = Series::create([
                'title' => 'Pepper & Carrot',
                'description' => 'A CC-BY-4.0 webcomic by David Revoy',
                'volume_name' => 'season',
                'issue_name' => 'episode',
                'strip_name' => 'page'
            ])->setStatus('public', 'seed data'))->id,
            'authorables_type' => 'series',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $series->addMedia(__DIR__ . '/media/peppercarrot/2015-10-12_logo_by-David-Revoy.jpg')->preservingOriginal()->toMediaCollection('logo');
        $series->addMedia(__DIR__ . '/media/peppercarrot/2018-07-11_wide-banner_by-David-Revoy.jpg')->preservingOriginal()->toMediaCollection('banner');
    }
}
