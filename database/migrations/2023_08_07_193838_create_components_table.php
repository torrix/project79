<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('html')->nullable();
            $table->text('overrides')->nullable();
            $table->text('scss')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('css')->nullable();
            $table->enum('theme', ['light', 'dark'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
