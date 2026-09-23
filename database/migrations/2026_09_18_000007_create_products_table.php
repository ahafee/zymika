<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->string('category'); // cbd_oil, thc_oil, balanced_extract, medicinal_flower, vaporiser, accessory
            $table->string('brand')->default('ZOVI LEAF');
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('thc_potency')->nullable(); // e.g. "20% THC" or "10mg/mL"
            $table->string('cbd_potency')->nullable(); // e.g. "<1% CBD" or "50mg/mL"
            $table->string('form_factor')->default('Tincture Oil (30ml)'); // Oil, Dried Flower, Device
            $table->string('terpene_profile')->nullable(); // Myrcene, Caryophyllene, Limonene
            $table->string('tga_schedule')->default('Schedule 8 (Controlled Drug)'); // Schedule 4, Schedule 8, Unscheduled
            $table->decimal('price', 8, 2);
            $table->integer('stock_quantity')->default(50);
            $table->boolean('is_prescription_required')->default(true);
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
