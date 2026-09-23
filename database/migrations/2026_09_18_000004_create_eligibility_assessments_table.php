<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eligibility_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('age_bracket');
            $table->json('primary_conditions'); // e.g. ["Chronic Pain", "Insomnia", "Anxiety"]
            $table->string('condition_duration'); // e.g. "Over 3 months"
            $table->json('previous_treatments')->nullable();
            $table->boolean('tried_standard_medications')->default(true);
            $table->boolean('is_pregnant_or_breastfeeding')->default(false);
            $table->boolean('has_psychosis_history')->default(false);
            $table->boolean('has_cardiovascular_issues')->default(false);
            $table->boolean('is_eligible')->default(true);
            $table->text('clinical_rationale')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eligibility_assessments');
    }
};
