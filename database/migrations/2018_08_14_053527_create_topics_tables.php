<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('latest_version');
            $table->unsignedBigInteger('category_id');
            $table->string('slug', 50);
            $table->timestamp('created_at');
        });

        Schema::create('topics_version', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_id');
            $table->integer('version');
            $table->primary(['ref_id', 'version']);
            $table->json('name');
            $table->json('description');
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
        Schema::dropIfExists('topics_version');
        Schema::dropIfExists('topics');
    }
}
