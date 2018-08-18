<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CreateSuper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracomic:create-super
                            {--email= : The email address of the user to create}
                            {name? : The name of the user to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a super user account, with full control over the site, but no authoring abilities';

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
        $name = $this->argument('name') ?: $this->ask('Super user\'s name');
        $email = $this->option('email') ?: $this->ask('Super user\'s email address');
        $pass = $this->secret('Super user\'s password');
        $verify = $this->secret('Super user\'s password again');

        if (empty($name) || empty($email) || empty($pass) || $pass != $verify) {
            $this->error('Invalid input; trying again.');
            return $this->handle();
        }

        $user = User::create(['name' => $name, 'email' => $email, 'password' => \Hash::make($pass)]);
        $user->is_super = true;
        $user->is_author = false;
        $user->save();

        $this->line('User created! You can now log in.');
    }
}
