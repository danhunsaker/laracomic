<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('latest_version');
            $table->unsignedBigInteger('issue_id');
            $table->timestamp('created_at');
        });

        Schema::create('strips_version', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_id');
            $table->integer('version');
            $table->primary(['ref_id', 'version']);
            $table->double('number', 10, 2);
            $table->json('title');
            $table->json('description');
            $table->json('commentary');
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
        Schema::dropIfExists('strips_version');
        Schema::dropIfExists('strips');
    }
}
