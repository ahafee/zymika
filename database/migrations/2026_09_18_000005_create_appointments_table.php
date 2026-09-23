<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_number')->unique();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('eligibility_assessment_id')->nullable()->constrained()->nullOnDelete();
            $table->date('appointment_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status')->default('confirmed'); // pending, confirmed, completed, cancelled, no_show
            $table->string('consult_type')->default('telehealth_video'); // telehealth_video, telehealth_phone
            $table->string('video_meeting_url')->nullable();
            $table->text('patient_notes')->nullable();
            $table->text('clinical_summary')->nullable();
            $table->boolean('pre_consult_completed')->default(false);
            $table->string('payment_status')->default('paid'); // unpaid, paid, refunded
            $table->decimal('amount_paid', 8, 2)->default(79.00);
            $table->string('medirecords_appointment_id')->nullable()->index();
            $table->string('medirecords_sync_status')->default('pending'); // synced, pending, failed
            $table->timestamp('last_synced_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
