<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title')->default('Dr.');
            $table->string('ahpra_number')->nullable();
            $table->string('provider_number')->nullable();
            $table->string('prescriber_number')->nullable();
            $table->string('specialty')->default('Medicinal Cannabis & General Practice');
            $table->text('bio')->nullable();
            $table->decimal('consultation_fee', 8, 2)->default(79.00);
            $table->string('medirecords_practitioner_id')->nullable()->index();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
