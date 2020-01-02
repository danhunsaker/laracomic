<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Volume;
use App\Series;
use App\Authority;
use App\Role;
use App\User;

class VolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authority::create([
            'authorables_id' => Volume::create([
                'series_id' => Series::where(['route' => 'walnuts'])->first()->id,
                'number' => -1.5,
                'title' => 'Before The Beginning',
                'description' => 'Another test!',
            ])->setStatus('public', 'seed data')->id,
            'authorables_type' => 'volume',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);

        /*
         * Pepper & Carrot - by David Revoy
         */

        Authority::create([
            'authorables_id' => Volume::create([
                'series_id' => Series::where(['route' => 'pepper-carrot'])->first()->id,
                'number' => 1,
                'title' => 'Season One',
                'description' => 'The first 11 episodes',
            ])->setStatus('public', 'seed data')->id,
            'authorables_type' => 'volume',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);

        Authority::create([
            'authorables_id' => Volume::create([
                'series_id' => Series::where(['route' => 'pepper-carrot'])->first()->id,
                'number' => 2,
                'title' => 'Season Two',
                'description' => 'Episodes 12-21',
            ])->setStatus('public', 'seed data')->id,
            'authorables_type' => 'volume',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);

        Authority::create([
            'authorables_id' => Volume::create([
                'series_id' => Series::where(['route' => 'pepper-carrot'])->first()->id,
                'number' => 3,
                'title' => 'Season Three',
                'description' => 'Episodes 22-29',
            ])->setStatus('public', 'seed data')->id,
            'authorables_type' => 'volume',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);

        Authority::create([
            'authorables_id' => Volume::create([
                'series_id' => Series::where(['route' => 'pepper-carrot'])->first()->id,
                'number' => 4,
                'title' => 'Season Four',
                'description' => 'Episodes 30-',
            ])->setStatus('public', 'seed data')->id,
            'authorables_type' => 'volume',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
    }
}
