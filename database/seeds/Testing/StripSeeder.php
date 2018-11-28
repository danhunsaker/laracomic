<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Strip;
use App\Issue;
use App\Authority;
use App\Role;
use App\User;
use Spatie\Image\Manipulations;

class StripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authority::create([
            'authorables_id' => ($strip1 = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 1,
                'title' => 'OHAI',
                'description' => 'A picture of some walnuts.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip1->setStatus('public', 'seed data');
        $strip1->addMedia(__DIR__ . '/walnuts-1.jpg')->preservingOriginal()->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip2 = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 2,
                'title' => 'OHAI – AGAIN!',
                'description' => 'A picture of some walnuts, flipped upside down.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip2->setStatus('public', 'seed data');
        $strip2->addMedia(__DIR__ . '/walnuts-1.jpg')->preservingOriginal()->usingFileName('walnuts-2.jpg')->withManipulations(['*' => ['flip' => 'h']])->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip3 = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 3,
                'title' => 'OHAI – Another Time?',
                'description' => 'A picture of some walnuts, sepia-toned.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip3->setStatus('public', 'seed data');
        $strip3->addMedia(__DIR__ . '/walnuts-1.jpg')->preservingOriginal()->usingFileName('walnuts-3.jpg')->withManipulations(['*' => ['filter' => 'sepia']])->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip4 = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 4,
                'title' => 'Oh. Hi. ....',
                'description' => 'A picture of some walnuts, heavily pixelated.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip4->setStatus('public', 'seed data');
        $strip4->addMedia(__DIR__ . '/walnuts-1.jpg')->preservingOriginal()->usingFileName('walnuts-4.jpg')->withManipulations(['*' => ['pixelate' => '25']])->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip5 = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 1.5,
                'title' => 'OHAIHAIHAI!',
                'description' => 'A picture of some walnuts, rotated 90 degrees counter-clockwise.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip5->setStatus('public', 'seed data');
        $strip5->addMedia(__DIR__ . '/walnuts-1.jpg')->preservingOriginal()->usingFileName('walnuts-1.5.jpg')->withManipulations(['*' => ['orientation' => '90']])->toMediaCollection('content');
    }
}
