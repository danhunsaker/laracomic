<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue05
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 5])->first()->id,
                'number' => 1,
                'title' => 'Special holiday episode (Part 1)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E05/en/Pepper-and-Carrot_by-David-Revoy_E05P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-5-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 5])->first()->id,
                'number' => 2,
                'title' => 'Special holiday episode (Part 2)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E05/en/Pepper-and-Carrot_by-David-Revoy_E05P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-5-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 5])->first()->id,
                'number' => 3,
                'title' => 'Special holiday episode (Part 3)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E05/en/Pepper-and-Carrot_by-David-Revoy_E05P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-5-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 5])->first()->id,
                'number' => 4,
                'title' => 'Special holiday episode (Part 4)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E05/en/Pepper-and-Carrot_by-David-Revoy_E05P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-5-4.jpg')->toMediaCollection('content');
    }
}
