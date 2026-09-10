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

            $table->foreignId('room_id')
                ->constrained('rooms')
                ->cascadeOnDelete();

            $table->string('course_name');
            $table->string('subject')->nullable();
            $table->string('instructor')->nullable();

            $table->unsignedInteger('expected_participants')->default(0);
            $table->unsignedInteger('present_participants')->default(0);


            $table->dateTime('start_at');
            $table->dateTime('end_at');

            $table->string('status')->default('scheduled');

            // ID dari sistem/web lama, untuk keperluan sinkronisasi nanti
             $table->string('source_id')->nullable()->unique();

            $table->timestamps();
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
