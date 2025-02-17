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
        Schema::table('accommodations', function (Blueprint $table) {
            // Mengubah kolom 'star', 'telp', 'instagram', dan 'website' menjadi nullable
            $table->string('star')->nullable()->change();
            $table->string('telp')->nullable()->change();
            $table->text('instagram')->nullable()->change();
            $table->text('website')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accommodations', function (Blueprint $table) {
            // Mengembalikan kolom menjadi default seperti semula
            $table->string('star')->default('non')->change();
            $table->string('telp')->default('-')->change();
            $table->text('instagram')->default('-')->change();
            $table->text('website')->default('-')->change();
        });
    }
};
