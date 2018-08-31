<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Strip;
use App\Issue;
use App\Authority;
use App\Role;
use App\User;

class StripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authority::create([
            'authorables_id' => Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 1,
                'title' => 'OHAI',
                'description' => 'This should have an image, but I\'m too lazy...',
                'commentary' => 'Yup! It\'s still a test!',
            ])->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
    }
}
