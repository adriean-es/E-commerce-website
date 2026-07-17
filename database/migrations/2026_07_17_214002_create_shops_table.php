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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The Seller (owner)
            $table->string('name');
            $table->string('slug')->unique();                    // URL-friendly shop name e.g. "johns-store"
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('status')->default('pending');        // pending, active, suspended
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
