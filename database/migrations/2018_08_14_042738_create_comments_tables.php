<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('latest_version');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->unsignedBigInteger('commenter_id');
            $table->timestamp('created_at');
        });

        Schema::create('comments_version', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_id');
            $table->integer('version');
            $table->primary(['ref_id', 'version']);
            $table->json('comment');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_version');
        Schema::dropIfExists('comments');
    }
}
