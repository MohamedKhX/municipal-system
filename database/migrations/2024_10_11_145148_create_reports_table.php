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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description');
            $table->decimal('location_latitude', 12, 8);
            $table->decimal('location_longitude', 12, 8);
            $table->string('street', 100);

            $table->enum('status', \App\Enums\ReportStatus::values())
                ->default(\App\Enums\ReportStatus::Open);

            $table->softDeletes();
            $table->foreignId('report_type_id')->references('id')->on('report_types');
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
        Schema::dropIfExists('reports');
    }
};
