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
            $table->string('task_category');
            $table->string('task_name');
            $table->string('pic');
            $table->string('task_executor');
            $table->date('start_date');
            $table->date('due_date');
            $table->time('start_time');
            $table->time('stop_time');
            $table->integer('progress')->unsigned();
            $table->string('prev_task');
            $table->string('qc_tester');
            $table->date('qc_testdate');
            $table->string('qc_properness');
            $table->text('notes');
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
