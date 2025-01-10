<?php

use App\Enums\RequestStatus;
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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);

            $table->string('subject', 100);
            $table->text('message');
            $table->text('response')->nullable();
            $table->decimal('location_latitude', 12, 8)->nullable();
            $table->decimal('location_longitude', 12, 8)->nullable();

            $table->enum('status', \App\Enums\RequestStatus::values())
                ->default(RequestStatus::Pending);

            $table->foreignId('request_type_id')->references('id')->on('request_types');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('municipality_id')->references('id')->on('municipalities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
