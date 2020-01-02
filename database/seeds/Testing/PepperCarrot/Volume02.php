<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Volume;
use App\Authority;
use App\Role;
use App\User;

class Volume02
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 12,
                'title' => 'Autumn Clearout',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E12/en/Pepper-and-Carrot_by-David-Revoy_E12.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-12-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 13,
                'title' => 'The Pyjama Party',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E13/en/Pepper-and-Carrot_by-David-Revoy_E13.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-13-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 14,
                'title' => "The Dragon's Tooth",
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E14/en/Pepper-and-Carrot_by-David-Revoy_E14.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-14-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 15,
                'title' => 'The Crystal Ball',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E15/en/Pepper-and-Carrot_by-David-Revoy_E15.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-15-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 16,
                'title' => 'The Sage of the Mountain',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E16/en/Pepper-and-Carrot_by-David-Revoy_E16.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-16-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 17,
                'title' => 'A Fresh Start',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E17/en/Pepper-and-Carrot_by-David-Revoy_E17.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-17-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 18,
                'title' => 'The Encounter',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E18/en/Pepper-and-Carrot_by-David-Revoy_E18.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-18-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 19,
                'title' => 'Pollution',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E19/en/Pepper-and-Carrot_by-David-Revoy_E19.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-19-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 20,
                'title' => 'The Picnic',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E20/en/Pepper-and-Carrot_by-David-Revoy_E20.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-20-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 2])->first()->id,
                'number' => 21,
                'title' => 'The Magic Contest',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S02/E21/en/Pepper-and-Carrot_by-David-Revoy_E21.jpg')->preservingOriginal()->usingFileName('peppercarrot-2-21-cover.jpg')->toMediaCollection('cover');
    }
}
