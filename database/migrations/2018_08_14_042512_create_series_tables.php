<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('latest_version');
            $table->string('slug', 50)->unique();
            $table->timestamp('created_at');
        });

        Schema::create('series_version', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_id');
            $table->integer('version');
            $table->primary(['ref_id', 'version']);
            $table->json('title');
            $table->json('description');
            $table->json('volume_name');
            $table->json('issue_name');
            $table->json('strip_name');
            $table->boolean('comments_enabled');
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
        Schema::dropIfExists('series_version');
        Schema::dropIfExists('series');
    }
}
