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
        Schema::create('cost_of_living', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->year('year');
            $table->decimal('cost_living_index', 10, 3);
            $table->decimal('rent_index', 10, 3);
            $table->decimal('cost_living_plus_rent_index', 10, 3);
            $table->decimal('groceries_index', 10, 3);
            $table->decimal('restaurant_price_index', 10, 3);
            $table->decimal('local_purchasing_power_index', 10, 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cost_of_living');
    }
};
