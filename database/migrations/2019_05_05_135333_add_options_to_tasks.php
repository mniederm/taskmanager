<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOptionsToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table){
            $table->string('keyword')->default(null);
            $table->string('url')->default(null);
            $table->integer('status')->default(0);
            $table->timestamp('implemented_at')->default('1990-01-01 00:00:00');
            $table->integer('impact')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function($table){
            $table->dropColumn('keyword');
            $table->dropColumn('url');
            $table->dropColumn('status');
            $table->dropColumn('implemented_at');
            $table->dropColumn('impact');
        });
    }
}
