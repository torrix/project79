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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('component_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('component_id');
            $table->integer('tag_id');
            $table->timestamps();

            $table
                ->foreign('component_id')
                ->references('id')
                ->on('components');

            $table
                ->foreign('tag_id')
                ->references('id')
                ->on('tags');
        });

        Schema::table('components', function (Blueprint $table) {
            $table
                ->text('description')
                ->after('name')
                ->nullable();

            $table
                ->integer('user_id')
                ->after('id')
                ->nullable();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_tag');
        Schema::dropIfExists('tags');

        Schema::table('components', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'user_id',
            ]);
        });
    }
};
