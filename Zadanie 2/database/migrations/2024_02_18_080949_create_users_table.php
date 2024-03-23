<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'pgsql';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login')->unique();
            $table->string('password');
            $table->string('name')->nullable(true);
            $table->string('surname')->nullable(true);
            $table->string('email')->unique();
            $table->string('address')->nullable(true);
            $table->string('phone_number')->nullable(true)->unique();
            $table->timestamp('created_at');
            $table->boolean('admin')->default(false);
            $table->string('postal_code')->nullable(true);
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