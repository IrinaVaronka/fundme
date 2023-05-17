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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('text', 1000);
            $table->decimal('donate', 8);
            $table->decimal('sum', 8)->unsigned();
            $table->string('photo', 200)->nullable()->default(null);
            $table->decimal('rate', 20)->unsigned()->nullable()->default(null);
            $table->json('rates')->default('[]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
