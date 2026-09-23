<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('prescription_number')->unique();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->string('medication_name');
            $table->string('dosage_instructions');
            $table->integer('repeats_total')->default(5);
            $table->integer('repeats_left')->default(5);
            $table->string('tga_sas_category')->default('Authorised Prescriber (AP)');
            $table->string('status')->default('active'); // active, expired, exhausted
            $table->date('issued_date');
            $table->date('expiry_date');
            $table->string('medirecords_script_id')->nullable()->index();
            $table->text('clinical_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
