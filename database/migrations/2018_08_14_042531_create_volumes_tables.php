<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolumesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('latest_version');
            $table->unsignedBigInteger('series_id');
            $table->timestamp('created_at');
        });

        Schema::create('volumes_version', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_id');
            $table->integer('version');
            $table->primary(['ref_id', 'version']);
            $table->double('number', 10, 2);
            $table->json('title');
            $table->json('description');
            $table->json('issue_name')->nullable();
            $table->json('strip_name')->nullable();
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
        Schema::dropIfExists('volumes_version');
        Schema::dropIfExists('volumes');
    }
}
