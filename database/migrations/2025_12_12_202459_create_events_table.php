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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // 1. CRUD: Primary Key
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date');        // 7. Dates
            $table->time('start_time');  // 6. Timing of events
            $table->time('end_time');
            $table->string('sangeet_details')->nullable(); // 5. Sangeet/Music detail
            $table->string('food_option'); // 4. Food and food option
            $table->decimal('price', 8, 2); // For payment option reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
