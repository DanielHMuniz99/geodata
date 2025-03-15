<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up(): void
    {
        Schema::create('country_currencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->string('currency', 3);
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_currencies');
    }
};