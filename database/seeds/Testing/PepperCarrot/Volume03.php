<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Volume;
use App\Authority;
use App\Role;
use App\User;

class Volume03
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 3])->first()->id,
                'number' => 22,
                'title' => 'The Voting System',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S03/E22/en/Pepper-and-Carrot_by-David-Revoy_E22.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-22-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 3])->first()->id,
                'number' => 23,
                'title' => 'Take a Chance',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S03/E23/en/Pepper-and-Carrot_by-David-Revoy_E23.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-23-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 3])->first()->id,
                'number' => 24,
                'title' => 'The Unity Tree',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S03/E24/en/Pepper-and-Carrot_by-David-Revoy_E24.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-24-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 3])->first()->id,
                'number' => 25,
                'title' => 'There Are No Shortcuts',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S03/E25/en/Pepper-and-Carrot_by-David-Revoy_E25.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-25-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 3])->first()->id,
                'number' => 26,
                'title' => 'Books Are Great',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S03/E26/en/Pepper-and-Carrot_by-David-Revoy_E26.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-26-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 3])->first()->id,
                'number' => 27,
                'title' => "Coriander's Invention",
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S03/E27/en/Pepper-and-Carrot_by-David-Revoy_E27.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-27-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 3])->first()->id,
                'number' => 28,
                'title' => 'The Festivities',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S03/E28/en/Pepper-and-Carrot_by-David-Revoy_E28.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-28-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 3])->first()->id,
                'number' => 29,
                'title' => 'Destroyer of Worlds',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S03/E29/en/Pepper-and-Carrot_by-David-Revoy_E29.jpg')->preservingOriginal()->usingFileName('peppercarrot-3-29-cover.jpg')->toMediaCollection('cover');
    }
}
