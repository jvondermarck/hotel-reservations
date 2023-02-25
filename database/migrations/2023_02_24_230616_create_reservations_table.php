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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Enquired', 'Requested', 'Optional', 'Confirmed', 'Started', 'Processed', 'Canceled'])->nullable();
            $table->string('source');
            $table->string('segment');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->dateTime('cancelled_at')->nullable();
            $table->dateTime('created_at_in_pms');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->string('requested_category_id');
            $table->string('rate_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
