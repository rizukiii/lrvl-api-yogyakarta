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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('title');
            $table->text('description');
            $table->string('star')->default('non');
            $table->text('address');
            $table->string('telp')->default('-');
            $table->text('instagram')->default('-');
            $table->text('website')->default('-');
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
