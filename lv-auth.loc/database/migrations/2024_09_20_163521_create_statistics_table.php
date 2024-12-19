<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Statistic', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedTinyInteger('status')->nullable();
            $table->date('date_set')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_finish')->nullable();
            $table->dateTime('datetime_completed')->nullable();

            $table->softDeletes();
            $table->index('task_id', 'statistic_tasks_idx');
            $table->foreign('task_id', 'statistic_tasks_fh')->on('Tasks')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Statistic');
    }
};
