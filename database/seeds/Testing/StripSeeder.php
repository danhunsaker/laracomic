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
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 1,
                'title' => 'OHAI',
                'description' => 'A picture of some walnuts.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/media/walnuts/page-1.jpg')->preservingOriginal()->usingFileName('walnuts-1.jpg')->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 2,
                'title' => 'OHAI – AGAIN!',
                'description' => 'A picture of some walnuts, flipped upside down.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/media/walnuts/page-1.jpg')->preservingOriginal()->usingFileName('walnuts-2.jpg')->withManipulations(['*' => ['flip' => 'h']])->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 3,
                'title' => 'OHAI – Another Time?',
                'description' => 'A picture of some walnuts, sepia-toned.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/media/walnuts/page-1.jpg')->preservingOriginal()->usingFileName('walnuts-3.jpg')->withManipulations(['*' => ['filter' => 'sepia']])->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 4,
                'title' => 'Oh. Hi. ....',
                'description' => 'A picture of some walnuts, heavily pixelated.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/media/walnuts/page-1.jpg')->preservingOriginal()->usingFileName('walnuts-4.jpg')->withManipulations(['*' => ['pixelate' => '25']])->toMediaCollection('content');

        Authority::create([
            'authorables_id' => ($strip = Strip::create([
                'issue_id' => Issue::where(['number' => 0])->first()->id,
                'number' => 1.5,
                'title' => 'OHAIHAIHAI!',
                'description' => 'A picture of some walnuts, rotated 90 degrees counter-clockwise.',
                'commentary' => 'Yup! It\'s still a test!',
            ]))->setStatus('public', 'seed data')->id,
            'authorables_type' => 'strip',
            'role_id' => Role::where(['name' => 'creator'])->first()->id,
            'user_id' => User::where(['is_author' => true])->first()->id,
        ]);
        $strip->addMedia(__DIR__ . '/media/walnuts/page-1.jpg')->preservingOriginal()->usingFileName('walnuts-1.5.jpg')->withManipulations(['*' => ['orientation' => '90']])->toMediaCollection('content');

        /*
         * Pepper & Carrot - by David Revoy
         */

        PepperCarrot\Issue01::run();

        PepperCarrot\Issue02::run();

        PepperCarrot\Issue03::run();

        PepperCarrot\Issue04::run();

        PepperCarrot\Issue05::run();

        PepperCarrot\Issue06::run();

        PepperCarrot\Issue07::run();

        PepperCarrot\Issue08::run();

        PepperCarrot\Issue09::run();

        PepperCarrot\Issue10::run();

        PepperCarrot\Issue11::run();

        PepperCarrot\Issue12::run();

        PepperCarrot\Issue13::run();

        PepperCarrot\Issue14::run();

        PepperCarrot\Issue15::run();

        PepperCarrot\Issue16::run();

        PepperCarrot\Issue17::run();

        PepperCarrot\Issue18::run();

        PepperCarrot\Issue19::run();

        PepperCarrot\Issue20::run();

        PepperCarrot\Issue21::run();

        PepperCarrot\Issue22::run();

        PepperCarrot\Issue23::run();

        PepperCarrot\Issue24::run();

        PepperCarrot\Issue25::run();

        PepperCarrot\Issue26::run();

        PepperCarrot\Issue27::run();

        PepperCarrot\Issue28::run();

        PepperCarrot\Issue29::run();

        PepperCarrot\Issue30::run();

        PepperCarrot\Issue31::run();
    }
}
