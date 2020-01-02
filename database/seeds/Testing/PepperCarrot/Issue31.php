<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue31
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 31])->first()->id,
                'number' => 1,
                'title' => 'The Fight (Part 1)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S04/E31/en/Pepper-and-Carrot_by-David-Revoy_E31P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-31-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 31])->first()->id,
                'number' => 2,
                'title' => 'The Fight (Part 2)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S04/E31/en/Pepper-and-Carrot_by-David-Revoy_E31P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-31-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 31])->first()->id,
                'number' => 3,
                'title' => 'The Fight (Part 3)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S04/E31/en/Pepper-and-Carrot_by-David-Revoy_E31P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-31-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 31])->first()->id,
                'number' => 4,
                'title' => 'The Fight (Part 4)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S04/E31/en/Pepper-and-Carrot_by-David-Revoy_E31P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-31-4.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 31])->first()->id,
                'number' => 5,
                'title' => 'The Fight (Part 5)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S04/E31/en/Pepper-and-Carrot_by-David-Revoy_E31P05.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-31-5.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 31])->first()->id,
                'number' => 6,
                'title' => 'The Fight (Part 6)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S04/E31/en/Pepper-and-Carrot_by-David-Revoy_E31P06.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-31-6.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 31])->first()->id,
                'number' => 7,
                'title' => 'The Fight (Part 7)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S04/E31/en/Pepper-and-Carrot_by-David-Revoy_E31P07.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-31-7.jpg')->toMediaCollection('content');
    }
}
