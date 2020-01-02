<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue14
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 14])->first()->id,
                'number' => 1,
                'title' => "The Dragon's Tooth (Part 1)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E14/en/Pepper-and-Carrot_by-David-Revoy_E14P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-14-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 14])->first()->id,
                'number' => 2,
                'title' => "The Dragon's Tooth (Part 2)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E14/en/Pepper-and-Carrot_by-David-Revoy_E14P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-14-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 14])->first()->id,
                'number' => 3,
                'title' => "The Dragon's Tooth (Part 3)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E14/en/Pepper-and-Carrot_by-David-Revoy_E14P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-14-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 14])->first()->id,
                'number' => 4,
                'title' => "The Dragon's Tooth (Part 4)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E14/en/Pepper-and-Carrot_by-David-Revoy_E14P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-14-4.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 14])->first()->id,
                'number' => 5,
                'title' => "The Dragon's Tooth (Part 5)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E14/en/Pepper-and-Carrot_by-David-Revoy_E14P05.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-14-5.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 14])->first()->id,
                'number' => 6,
                'title' => "The Dragon's Tooth (Part 6)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S02/E14/en/Pepper-and-Carrot_by-David-Revoy_E14P06.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-14-6.jpg')->toMediaCollection('content');
    }
}
