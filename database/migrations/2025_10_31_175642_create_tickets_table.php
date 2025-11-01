<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_no')->unique(); // nomor unik tiket
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // pembuat tiket
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // kategori
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['Open', 'On Progress', 'Resolved', 'Closed'])->default('Open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};