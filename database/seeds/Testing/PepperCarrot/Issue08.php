<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue08
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 8])->first()->id,
                'number' => 1,
                'title' => "Pepper's Birthday Party (Part 1)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E08/en/Pepper-and-Carrot_by-David-Revoy_E08P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-8-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 8])->first()->id,
                'number' => 2,
                'title' => "Pepper's Birthday Party (Part 2)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E08/en/Pepper-and-Carrot_by-David-Revoy_E08P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-8-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 8])->first()->id,
                'number' => 3,
                'title' => "Pepper's Birthday Party (Part 3)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E08/en/Pepper-and-Carrot_by-David-Revoy_E08P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-8-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 8])->first()->id,
                'number' => 4,
                'title' => "Pepper's Birthday Party (Part 4)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E08/en/Pepper-and-Carrot_by-David-Revoy_E08P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-8-4.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 8])->first()->id,
                'number' => 5,
                'title' => "Pepper's Birthday Party (Part 5)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E08/en/Pepper-and-Carrot_by-David-Revoy_E08P05.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-8-5.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 8])->first()->id,
                'number' => 6,
                'title' => "Pepper's Birthday Party (Part 6)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S01/E08/en/Pepper-and-Carrot_by-David-Revoy_E08P06.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-8-6.jpg')->toMediaCollection('content');
    }
}
