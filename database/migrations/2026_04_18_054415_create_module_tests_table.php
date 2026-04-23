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
        Schema::create('module_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();

            $table->integer('max_attempt')->default(1);
            $table->integer('minimum_pass_score')->default(0);

            $table->timestamp('date_open')->nullable();
            $table->timestamp('date_close')->nullable();

            $table->integer('time_limit_minutes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_tests');
    }
};
