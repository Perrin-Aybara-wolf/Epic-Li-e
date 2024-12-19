<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('path_img');
            $table->text('wear_img');
            $table->unsignedBigInteger('gm')->default(0);
            $table->unsignedBigInteger('dm')->default(0);
            $table->unsignedBigInteger('count')->nullable();
            $table->set('type', ['food', 'close', 'armor', 'weapon', 'potion', 'mag_items', 'trophy']);
            $table->set('body', ['head', 'body', 'legs', 'foots', 'l_arm', 'r_arm',]);
            $table->timestamps();

            $table->softDeletes();


            $table->unsignedSmallInteger('str_atak')->default(0);
            $table->unsignedSmallInteger('str_armor')->default(0);

            $table->unsignedSmallInteger('intel_atak')->default(0);
            $table->unsignedSmallInteger('intel_armor')->default(0);

            $table->unsignedSmallInteger('dex_atak')->default(0);
            $table->unsignedSmallInteger('dex_armor')->default(0);

            $table->unsignedSmallInteger('tilo_atak')->default(0);
            $table->unsignedSmallInteger('tilo_armor')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
