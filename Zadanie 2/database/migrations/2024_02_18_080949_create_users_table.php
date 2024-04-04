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
            $table->string('login', 64)->unique()->nullable(false);
            $table->binary('password')->nullable(false);
            $table->string('name', 35)->nullable(true);
            $table->string('surname', 35)->nullable(true);
            $table->string('email', 254)->unique();
            $table->string('address', 175)->nullable(true);
            $table->string('postal_code', 11)->nullable(true);
            $table->string('phone_number', 15)->nullable(true)->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->boolean('admin')->default(false);
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