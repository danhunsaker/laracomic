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
    }
}
