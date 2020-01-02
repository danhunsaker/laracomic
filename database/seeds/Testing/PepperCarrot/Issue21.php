<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue21
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 21])->first()->id,
                'number' => 1,
                'title' => 'The Magic Contest (Part 1)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E21/en/Pepper-and-Carrot_by-David-Revoy_E21P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-21-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 21])->first()->id,
                'number' => 2,
                'title' => 'The Magic Contest (Part 2)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E21/en/Pepper-and-Carrot_by-David-Revoy_E21P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-21-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 21])->first()->id,
                'number' => 3,
                'title' => 'The Magic Contest (Part 3)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E21/en/Pepper-and-Carrot_by-David-Revoy_E21P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-21-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 21])->first()->id,
                'number' => 4,
                'title' => 'The Magic Contest (Part 4)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E21/en/Pepper-and-Carrot_by-David-Revoy_E21P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-21-4.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 21])->first()->id,
                'number' => 5,
                'title' => 'The Magic Contest (Part 5)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E21/en/Pepper-and-Carrot_by-David-Revoy_E21P05.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-21-5.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 21])->first()->id,
                'number' => 6,
                'title' => 'The Magic Contest (Part 6)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E21/en/Pepper-and-Carrot_by-David-Revoy_E21P06.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-21-6.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 21])->first()->id,
                'number' => 7,
                'title' => 'The Magic Contest (Part 7)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E21/en/Pepper-and-Carrot_by-David-Revoy_E21P07.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-21-7.jpg')->toMediaCollection('content');
    }
}
