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
        Schema::create('Quests', function(Blueprint $table){
            $table->id();
            
            $table->string('name');
            $table->text('description');
            $table->text('path_title_img')->nullable();
            $table->text('path_icon_img')->nullable();
            $table->unsignedSmallInteger('rynok_pos')->nullable()->default(1);
            $table->unsignedSmallInteger('price');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Quests');
    }
};
