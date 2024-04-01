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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('postalcode', 5)->default(null);
            $table->string('city')->default(null);
            $table->string('department')->default(null);
            $table->decimal('city_lat', 10, 7)->default(null);
            $table->decimal('city_long', 10, 7)->default(null);
            $table->string('password');
            $table->unsignedTinyInteger('status')->default(\App\Enums\UserStatus::Member);
            $table->boolean('is_ban')->default(false);
            $table->string('image');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
