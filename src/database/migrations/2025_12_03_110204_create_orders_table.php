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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderNumber');
            $table->foreignId('customersId')->constrained('customers', 'customersId')->onDelete('cascade');
            $table->decimal('totalPrice', 10, 2);
            $table->string('paymentMethod');
            $table->text('deliveryAddress');
            $table->timestamp('purchaseDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
