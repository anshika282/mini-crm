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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Required first name
            $table->string('last_name'); // Required last name
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); // Foreign key to companies table
            $table->string('email')->nullable(); // Nullable email field
            $table->string('phone')->nullable(); // Nullable phone field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
