<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pre_consult_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->string('snapform_submission_id')->nullable()->index();
            $table->json('form_data');
            $table->string('regular_gp_name')->nullable();
            $table->string('regular_gp_clinic')->nullable();
            $table->text('current_medications')->nullable();
            $table->text('known_allergies')->nullable();
            $table->text('medical_history')->nullable();
            $table->boolean('consent_to_tga_sas')->default(true);
            $table->boolean('consent_to_gp_notification')->default(true);
            $table->boolean('synced_to_medirecords')->default(false);
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pre_consult_forms');
    }
};
