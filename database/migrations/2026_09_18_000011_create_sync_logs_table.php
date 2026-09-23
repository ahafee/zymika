<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sync_logs', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type'); // patient, appointment, prescription, webhook, reconciliation, snapform
            $table->string('entity_id')->nullable();
            $table->string('action'); // push, pull, webhook_received, reconciliation, token_refresh
            $table->string('status'); // success, failed, warning
            $table->json('request_payload')->nullable();
            $table->json('response_payload')->nullable();
            $table->text('error_message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sync_logs');
    }
};
