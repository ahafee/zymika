<?php

namespace App\Http\Controllers;

use App\Services\MediRecordsService;
use App\Services\SnapformsService;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function __construct(
        protected MediRecordsService $mediRecordsService,
        protected SnapformsService $snapformsService
    ) {}

    public function medirecords(Request $request)
    {
        $payload = $request->all();
        $signature = $request->header('X-MediRecords-Signature', '');

        $result = $this->mediRecordsService->handleWebhook($payload, $signature);

        return response()->json($result);
    }

    public function snapforms(Request $request)
    {
        $payload = $request->all();

        $result = $this->snapformsService->handleSubmission($payload);

        return response()->json($result);
    }
}
