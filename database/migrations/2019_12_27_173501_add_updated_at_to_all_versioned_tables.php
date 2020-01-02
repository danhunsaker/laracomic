<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdatedAtToAllVersionedTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('series', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('volumes', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('issues', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('strips', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('topics', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('series', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('volumes', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('issues', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('strips', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('topics', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });
    }
}
