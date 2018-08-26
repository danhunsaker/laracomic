<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('latest_version');
            $table->unsignedBigInteger('series_id');
            $table->string('route', 50);
            $table->timestamp('created_at');
        });

        Schema::create('pages_version', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_id');
            $table->integer('version');
            $table->primary(['ref_id', 'version']);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->json('title');
            $table->json('content');
            $table->boolean('comments_enabled')->nullable();
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
        Schema::dropIfExists('pages_version');
        Schema::dropIfExists('pages');
    }
}
