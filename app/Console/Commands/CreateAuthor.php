<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CreateAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracomic:create-author
                            {--email= : The email address of the user to create}
                            {name? : The name of the user to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an author account, with full authoring abilities, but no control over the site itself';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name') ?: $this->ask('Author\'s name');
        $email = $this->option('email') ?: $this->ask('Author\'s email address');
        $pass = $this->secret('Author\'s password');
        $verify = $this->secret('Author\'s password again');

        if (empty($name) || empty($email) || empty($pass) || $pass != $verify) {
            $this->error('Invalid input; trying again.');
            return $this->handle();
        }

        $user = User::create(['name' => $name, 'email' => $email, 'password' => \Hash::make($pass)]);
        $user->email_verified_at = now();
        $user->is_super = false;
        $user->is_author = true;
        $user->save();

        $this->line('Author created! You can now log in.');

        return 0;
    }
}
