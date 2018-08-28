<?php

namespace Testing;

use Illuminate\Database\Seeder;
use App\Post;
use App\Topic;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'topic_id' => Topic::where(['route' => 'a-topic'])->first()->id,
            'parent_id' => Post::create([
                'topic_id' => Topic::where(['route' => 'a-topic'])->first()->id,
                'parent_id' => null,
                'content' => 'A comment on the first topic...',
                'commenter_id' => User::where(['is_super' => true])->first()->id,
            ])->id,
            'content' => 'A reply to the comment on the first topic',
            'commenter_id' => User::where(['is_author' => true])->first()->id,
        ]);
        Post::create([
            'topic_id' => Topic::where(['route' => 'another-topic'])->first()->id,
            'parent_id' => null,
            'content' => 'A comment on the second topic',
            'commenter_id' => User::where(['is_super' => false, 'is_author' => false])->first()->id,
        ]);
    }
}
