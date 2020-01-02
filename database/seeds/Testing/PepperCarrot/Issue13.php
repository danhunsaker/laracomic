<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue13
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 13])->first()->id,
                'number' => 1,
                'title' => 'The Pyjama Party (Part 1)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E13/en/Pepper-and-Carrot_by-David-Revoy_E13P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-13-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 13])->first()->id,
                'number' => 2,
                'title' => 'The Pyjama Party (Part 2)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E13/en/Pepper-and-Carrot_by-David-Revoy_E13P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-13-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 13])->first()->id,
                'number' => 3,
                'title' => 'The Pyjama Party (Part 3)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E13/en/Pepper-and-Carrot_by-David-Revoy_E13P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-13-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 13])->first()->id,
                'number' => 4,
                'title' => 'The Pyjama Party (Part 4)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E13/en/Pepper-and-Carrot_by-David-Revoy_E13P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-13-4.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 13])->first()->id,
                'number' => 5,
                'title' => 'The Pyjama Party (Part 5)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E13/en/Pepper-and-Carrot_by-David-Revoy_E13P05.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-13-5.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 13])->first()->id,
                'number' => 6,
                'title' => 'The Pyjama Party (Part 6)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E13/en/Pepper-and-Carrot_by-David-Revoy_E13P06.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-13-6.jpg')->toMediaCollection('content');
    }
}
