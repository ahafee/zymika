<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('subtotal', 8, 2);
            $table->decimal('shipping_amount', 8, 2)->default(15.00);
            $table->decimal('discount_amount', 8, 2)->default(0.00);
            $table->decimal('total_amount', 8, 2);
            $table->string('status')->default('processing'); // pending_approval, processing, dispatched, delivered, cancelled
            $table->string('payment_status')->default('paid'); // pending, paid, refunded
            $table->string('payment_method')->default('card'); // card, medpay, direct_debit
            $table->string('transaction_id')->nullable();

            // Shipping details
            $table->string('shipping_name');
            $table->string('shipping_phone');
            $table->string('shipping_address_line1');
            $table->string('shipping_address_line2')->nullable();
            $table->string('shipping_city');
            $table->string('shipping_state')->default('NSW');
            $table->string('shipping_postcode');
            $table->string('tracking_number')->nullable();
            $table->string('tracking_carrier')->default('Australia Post Express (Signature Required)');
            $table->text('customer_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
