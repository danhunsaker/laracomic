<?php

namespace Testing\PepperCarrot;

use App\Issue;
use App\Volume;
use App\Authority;
use App\Role;
use App\User;

class Volume04
{
    public static function run() {
        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 4])->first()->id,
                'number' => 30,
                'title' => 'Need a Hug',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S04/E30/en/Pepper-and-Carrot_by-David-Revoy_E30.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-30-cover.jpg')->toMediaCollection('cover');

        Authority::create([
            'authorables_id' => ($issue = Issue::create([
                'volume_id' => Volume::where(['number' => 4])->first()->id,
                'number' => 31,
                'title' => 'The Fight',
                'description' => '',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'issue',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['email' => 'info@davidrevoy.com'])->first()->id,
        ]);
        $issue->addMedia(__DIR__ . '/../media/peppercarrot/S04/E31/en/Pepper-and-Carrot_by-David-Revoy_E31.jpg')->preservingOriginal()->usingFileName('peppercarrot-4-31-cover.jpg')->toMediaCollection('cover');
    }
}
