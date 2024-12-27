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
            $table->string('title'); // Title of the task
            $table->text('description'); // Description of the task
            $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Pending'); // Status of the task
            $table->date('due_date'); // Due date of the task
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for the user
            $table->timestamps();
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
