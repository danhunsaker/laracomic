<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Strip;
use App\Authority;
use App\Role;
use App\User;

class Issue29
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 29])->first()->id,
                'number' => 1,
                'title' => 'Destroyer of Worlds (Part 1)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29P01.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 29])->first()->id,
                'number' => 2,
                'title' => 'Destroyer of Worlds (Part 2)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29P02.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-2.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 29])->first()->id,
                'number' => 3,
                'title' => 'Destroyer of Worlds (Part 3)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29P03.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-3.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 29])->first()->id,
                'number' => 4,
                'title' => 'Destroyer of Worlds (Part 4)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29P04.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-4.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 29])->first()->id,
                'number' => 5,
                'title' => 'Destroyer of Worlds (Part 5)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29P05.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-5.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 29])->first()->id,
                'number' => 6,
                'title' => 'Destroyer of Worlds (Part 6)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29P06.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-6.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 29])->first()->id,
                'number' => 7,
                'title' => 'Destroyer of Worlds (Part 7)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29P07.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-7.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 29])->first()->id,
                'number' => 8,
                'title' => 'Destroyer of Worlds (Part 8)',
                'description' => '',
                'commentary' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29P08.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-8.jpg')->toMediaCollection('content');
    }
}
