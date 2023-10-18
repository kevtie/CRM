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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->dateTime('deadline')->nullable();
            $table->foreignId('type_id')->constrained('card_types');
            $table->foreignId('scrumboard_id')->constrained('scrumboards');
            $table->foreignId('category_id')->constrained('card_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
