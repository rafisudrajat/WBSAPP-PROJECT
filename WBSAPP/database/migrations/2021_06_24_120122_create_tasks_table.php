<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('gitlab_id');
            $table->bigInteger('task_cat_id')->unsigned();
            $table->string('task_name');
            $table->bigInteger('pic_id')->unsigned();
            $table->bigInteger('exec_id')->unsigned();
            $table->date('start_date');
            $table->date('due_date');
            $table->time('start_time');
            $table->time('stop_time');
            $table->integer('progress')->unsigned();
            $table->string('prev_task');
            $table->bigInteger('qc_tester_id')->unsigned()->nullable();
            $table->date('qc_testdate')->nullable();
            $table->string('qc_properness')->nullable();
            $table->text('notes');
            $table->foreign('task_cat_id')->references('id')->on('task_category')->onDelete('cascade');
            $table->foreign('pic_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('exec_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('qc_tester_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
