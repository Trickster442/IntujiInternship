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
        Schema::create('students', function (Blueprint $table) {
            $table->id()->primary()->unique()->autoIncrement();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('phone_num', 20);
            $table->integer('roll_no');
            $table->string('email', 30)->unique();
            $table->string('password', 40)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
