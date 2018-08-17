<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
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
            $table->string('slug', 50)->unique();
            $table->string('title', 250)->unique();
            $table->text('description');
            $table->string('volume_name', 50)->default('volume');
            $table->string('issue_name', 50)->default('issue');
            $table->string('strip_name', 50)->default('strip');
            $table->boolean('comments_enabled');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
