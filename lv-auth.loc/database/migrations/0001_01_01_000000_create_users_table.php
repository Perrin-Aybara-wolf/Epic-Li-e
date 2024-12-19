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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            
            $table->string('Foto')->nullable();
            $table->unsignedSmallInteger('Age')->default(18);
            // $table->date('First_come_in');
            // $table->date('Last_come_in');
            $table->unsignedSmallInteger('Class_Hero_id')->nullable();
            $table->unsignedInteger('Days_with_us')->default(1);
            $table->unsignedInteger('Serias_days')->default(0);
            $table->date('last_day')->default('2024-11-01');
            $table->unsignedSmallInteger('Hp')->default(100);
            $table->unsignedSmallInteger('Fight_Soul')->default(100);
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
            $table->unsignedSmallInteger('study')->default(0);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
