<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue27
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 27])->first()->id,
                'number' => 1,
                'title' => "Coriander's Invention (Part 1)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E27/en/Pepper-and-Carrot_by-David-Revoy_E27P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-27-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 27])->first()->id,
                'number' => 2,
                'title' => "Coriander's Invention (Part 2)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E27/en/Pepper-and-Carrot_by-David-Revoy_E27P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-27-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 27])->first()->id,
                'number' => 3,
                'title' => "Coriander's Invention (Part 3)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E27/en/Pepper-and-Carrot_by-David-Revoy_E27P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-27-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 27])->first()->id,
                'number' => 4,
                'title' => "Coriander's Invention (Part 4)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E27/en/Pepper-and-Carrot_by-David-Revoy_E27P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-27-4.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 27])->first()->id,
                'number' => 5,
                'title' => "Coriander's Invention (Part 5)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E27/en/Pepper-and-Carrot_by-David-Revoy_E27P05.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-27-5.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 27])->first()->id,
                'number' => 6,
                'title' => "Coriander's Invention (Part 6)",
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E27/en/Pepper-and-Carrot_by-David-Revoy_E27P06.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-27-6.jpg')->toMediaCollection('content');
    }
}
