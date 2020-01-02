<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue16
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 16])->first()->id,
                'number' => 1,
                'title' => 'The Sage of the Mountain (Part 1)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E16/en/Pepper-and-Carrot_by-David-Revoy_E16P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-16-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 16])->first()->id,
                'number' => 2,
                'title' => 'The Sage of the Mountain (Part 2)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E16/en/Pepper-and-Carrot_by-David-Revoy_E16P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-16-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 16])->first()->id,
                'number' => 3,
                'title' => 'The Sage of the Mountain (Part 3)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E16/en/Pepper-and-Carrot_by-David-Revoy_E16P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-16-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 16])->first()->id,
                'number' => 4,
                'title' => 'The Sage of the Mountain (Part 4)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E16/en/Pepper-and-Carrot_by-David-Revoy_E16P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-16-4.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 16])->first()->id,
                'number' => 5,
                'title' => 'The Sage of the Mountain (Part 5)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E16/en/Pepper-and-Carrot_by-David-Revoy_E16P05.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-16-5.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 16])->first()->id,
                'number' => 6,
                'title' => 'The Sage of the Mountain (Part 6)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E16/en/Pepper-and-Carrot_by-David-Revoy_E16P06.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-16-6.jpg')->toMediaCollection('content');
    }
}
