<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Volume;
use App\Authority;
use App\Role;
use App\User;

class Volume01
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 1,
                'title' => 'The Potion of Flight',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E01/en/Pepper-and-Carrot_by-David-Revoy_E01.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-1-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 2,
                'title' => 'Rainbow Potions',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E02/en/Pepper-and-Carrot_by-David-Revoy_E02.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-2-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 3,
                'title' => 'The Secret Ingredients',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E03/en/Pepper-and-Carrot_by-David-Revoy_E03.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-3-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 4,
                'title' => 'Stroke of Genius',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E04/en/Pepper-and-Carrot_by-David-Revoy_E04.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-4-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 5,
                'title' => 'Special holiday episode',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E05/en/Pepper-and-Carrot_by-David-Revoy_E05.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-5-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 6,
                'title' => 'The Potion Contest',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E06/en/Pepper-and-Carrot_by-David-Revoy_E06.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-6-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 7,
                'title' => 'The Wish',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E07/en/Pepper-and-Carrot_by-David-Revoy_E07.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-7-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 8,
                'title' => "Pepper's Birthday Party",
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E08/en/Pepper-and-Carrot_by-David-Revoy_E08.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-8-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 9,
                'title' => 'The Remedy',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E09/en/Pepper-and-Carrot_by-David-Revoy_E09.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-9-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 10,
                'title' => 'Summer Special',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E10/en/Pepper-and-Carrot_by-David-Revoy_E10.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-10-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 1])->first()->id,
                'number' => 11,
                'title' => 'The Witches of Chaosah',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S01/E11/en/Pepper-and-Carrot_by-David-Revoy_E11.jpg')->preservingOriginal()->usingFileName('peppercarrot-1-11-cover.jpg')->toMediaCollection('cover');
    }
}
