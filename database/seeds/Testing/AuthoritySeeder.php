<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Authority;
use App\Role;
use App\Series;
use App\User;

class AuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authority::create([
            'authorables_id' => Series::where(['route' => 'walnuts'])->first()->id,
            'authorables_type' => 'series',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
    }
}
