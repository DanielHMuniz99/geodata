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
        Schema::create('country_gdp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->year('year');
            $table->decimal('gdp_growth', 5, 2);
            $table->decimal('gdp_nominal', 15, 3);
            $table->decimal('gdp_per_capita_nominal', 15, 3);
            $table->decimal('gdp_ppp', 15, 3);
            $table->decimal('gdp_per_capita_ppp', 15, 3);
            $table->decimal('gdp_ppp_share', 10, 3);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('country_gdp');
    }
};
