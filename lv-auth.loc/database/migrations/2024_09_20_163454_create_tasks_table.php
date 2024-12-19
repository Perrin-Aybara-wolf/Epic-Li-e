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
        Schema::create('Tasks', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_id')->nullable();
            $table->unsignedSmallInteger('column');
            $table->string('name')->default('Безымянная');
            $table->string('description')->default('Без описания');
            $table->unsignedBigInteger('seria_now')->default(0);
            $table->unsignedBigInteger('max_seria')->default(0);
            $table->dateTime('datetime_start')->nullable();
            $table->dateTime('datetime_finish')->nullable();
            $table->unsignedSmallInteger('complexity')->default(1);
            $table->set('rep_days_week',['1', '2', '3', '4', '5', '6', '7'])->nullable();
            $table->unsignedBigInteger('rep_val')->nullable();
            $table->unsignedSmallInteger('val_to_rep')->nullable();

            $table->softDeletes();

            $table->index('user_id', 'task_users_idx');
            $table->foreign('user_id', 'task_users_fh')->on('users')->references('id');

            $table->index('category_id', 'task_categories_idx');
            $table->foreign('category_id', 'task_categories_fh')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tasks');
    }
};
