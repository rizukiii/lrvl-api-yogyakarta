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
        Schema::table('terminals', function (Blueprint $table) {

            $table->text('image')->nullable()->change();
            $table->string('open_at')->nullable()->change();
            $table->string('closed_at')->nullable()->change();
            $table->text('facilities')->nullable()->change();
            $table->string('telp')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('terminals', function (Blueprint $table) {

            $table->text('image');
            $table->string('open_at');
            $table->string('closed_at');
            $table->text('facilities');
            $table->string('telp');

        });
    }
};
