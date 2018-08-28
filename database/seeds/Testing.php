<?php

use Illuminate\Database\Seeder;

class Testing extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DatabaseSeeder::class);

        foreach (glob(__DIR__ . '/Testing/*') as $file) {
            require_once($file);
        }

        $this->call(Testing\UserSeeder::class);
        $this->call(Testing\SeriesSeeder::class);
        $this->call(Testing\CustomDomainSeeder::class);
        $this->call(Testing\RoleSeeder::class);
        $this->call(Testing\AuthoritySeeder::class);
        $this->call(Testing\VolumeSeeder::class);
        $this->call(Testing\IssueSeeder::class);
        $this->call(Testing\StripSeeder::class);
        $this->call(Testing\PageSeeder::class);
        $this->call(Testing\NewsSeeder::class);
        $this->call(Testing\CommentSeeder::class);
        $this->call(Testing\CategorySeeder::class);
        $this->call(Testing\TopicSeeder::class);
        $this->call(Testing\PostSeeder::class);
    }
}
