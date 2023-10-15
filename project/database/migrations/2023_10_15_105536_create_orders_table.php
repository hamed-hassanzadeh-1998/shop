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
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('address_id')->nullable()->constrained('adresses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('address_object')->nullable();
            $table->foreignId('payment_id')->nullable()->constrained('payments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('payment_object')->nullable();
            $table->tinyInteger('payment_type')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->foreignId('delivery_id')->nullable()->constrained('delivery')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('delivery_object')->nullable();
            $table->decimal('delivery_amount',20,3)->nullable();
            $table->tinyInteger('delivery_status')->default(0);
            $table->timestamp('delivery_date')->nullable();
            $table->decimal('order_final_amount',20,3)->nullable();
            $table->decimal('order_discount_amount',20,3)->nullable();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('coupon_object')->nullable();
            $table->decimal('order_coupon_discount_amount',20,3)->nullable();
            $table->foreignId('common_discount_id')->nullable()->constrained('common_discounts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('common_discount_object')->nullable();
            $table->decimal('order_total_products_discount_amount',20,3)->nullable();
            $table->tinyInteger('order_status')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
