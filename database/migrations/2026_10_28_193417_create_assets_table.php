<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
    $table->id();

    $table->string('asset_name');
    $table->string('category');

    $table->string('serial_number')->unique();

    $table->date('purchase_date')->nullable();

    $table->string('assigned_to')->nullable();

    $table->enum('status', [
        'Available',
        'Assigned',
        'Maintenance',
        'Retired'
    ])->default('Available');

    $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->timestamps();
});
    }
      public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};