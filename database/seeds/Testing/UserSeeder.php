<?php

namespace Testing;

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\StreamOutput;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stream = fopen('php://output', 'w');
        if (User::where(['is_author' => true])->get()->count() < 1) {
            \Artisan::call('laracomic:create-author', [], new StreamOutput($stream));
        }
        if (User::where(['is_super' => false, 'is_author' => false])->get()->count() < 1) {
            \Artisan::call('laracomic:create-user', [], new StreamOutput($stream));
        }

        \Artisan::call('laracomic:create-author', ['--email' => 'info@davidrevoy.com', 'name' => 'David Revoy'], new StreamOutput($stream));
    }
}
