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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('title');
            $table->text('description');
            $table->text('address');
            $table->string('open_at')->nullable();
            $table->string('closed_at')->nullable();
            $table->string('telp')->nullable();
            $table->text('instagram')->nullable();
            $table->text('website')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('tours');
    }
};
