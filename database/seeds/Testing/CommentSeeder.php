<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Comment;
use App\Page;
use App\News;
use App\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'commentable_id' => Page::where(['route' => 'about'])->first()->id,
            'commentable_type' => 'page',
            'commenter_id' => User::where(['is_author' => true])->first()->id,
            'comment' => 'Yeah, this is just a test comment...',
        ]);
        Comment::create([
            'commentable_id' => News::first()->id,
            'commentable_type' => 'news',
            'commenter_id' => User::where(['is_author' => true])->first()->id,
            'comment' => 'This is also a test comment...',
        ]);
    }
}
