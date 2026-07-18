<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Supplier Profiles
        Schema::create('supplier_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('company_name');
            $table->text('company_address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('tax_id', 50)->nullable();
            $table->enum('status', ['pending', 'active', 'suspended'])->default('pending');
            $table->timestamps();
        });

        // 2. Supplier Invitations
        Schema::create('supplier_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade'); // The inviting seller
            $table->string('invited_email');
            $table->foreignId('supplier_id')->nullable()->constrained('supplier_profiles')->onDelete('set null');
            $table->string('token', 64)->unique();
            $table->enum('status', ['pending', 'accepted', 'expired', 'cancelled'])->default('pending');
            $table->timestamp('expires_at');
            $table->timestamps();
        });

        // 3. Seller-Supplier Pivot Table (Many-to-Many)
        Schema::create('seller_suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('supplier_profiles')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive', 'blocked'])->default('active');
            $table->text('notes')->nullable();
            $table->timestamp('invited_at');
            $table->timestamp('accepted_at')->nullable();

            $table->unique(['shop_id', 'supplier_id']); // Ensure only one relationship per pair
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seller_suppliers');
        Schema::dropIfExists('supplier_invitations');
        Schema::dropIfExists('supplier_profiles');
    }
};
