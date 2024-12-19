<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
 * Соединение с БД, которое должно использоваться миграцией.
 *
 * @var string
 */
// protected $connection = `User_{$last_id}`;
// auth()->user()->id
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('UserData', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email');
            $table->string('Foto')->nullable();
            $table->unsignedSmallInteger('Age')->default(18);
            $table->date('First_come_in');
            $table->date('Last_come_in');
            $table->unsignedSmallInteger('Class_Hero_id')->nullable();
            $table->unsignedInteger('Days_with_us')->default(0);
            $table->unsignedInteger('Serias_days')->default(0);
            $table->unsignedSmallInteger('Hp')->default(0);
            $table->unsignedSmallInteger('Fight_Soul')->default(0);
            $table->unsignedInteger('Head_id')->nullable();
            $table->unsignedInteger('Eyes_id')->nullable();
            $table->unsignedInteger('Sex_id')->nullable();
            $table->unsignedInteger('Hair_id')->nullable();
            $table->unsignedInteger('Body_id')->nullable();
            $table->unsignedInteger('Left_arm_id')->nullable();
            $table->unsignedInteger('Right_arm_id')->nullable();
            $table->unsignedInteger('Foot_id')->nullable();
            $table->unsignedInteger('Shoes_id')->nullable();
            $table->unsignedInteger('Skin_id')->nullable();
            $table->unsignedInteger('GM')->default(0);
            $table->unsignedInteger('DM')->default(0);

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('UserData');
    }
};
