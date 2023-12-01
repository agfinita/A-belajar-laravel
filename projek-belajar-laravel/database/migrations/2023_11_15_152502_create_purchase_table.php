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
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->date('trx_date')->nullable();
            $table->integer('sub_amount')->nullable();
            $table->integer('amount_total')->nullable();
            $table->integer('discount')->nullable();
            $table->string('total_product')->nullable();
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase');
    }
};
