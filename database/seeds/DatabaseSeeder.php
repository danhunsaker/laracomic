<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\StreamOutput;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (User::where(['is_super' => true])->get()->count() < 1) {
            $stream = fopen('php://output', 'w');
            Artisan::call('laracomic:create-super', [], new StreamOutput($stream));
        }
    }
}
