<?php

namespace App\Console\Commands;

use App\Services\MediRecordsService;
use Illuminate\Console\Command;

class MediRecordsTestCommand extends Command
{
    protected $signature = 'medirecords:test';

    protected $description = 'Test OAuth 2.0 connectivity and token generation for MediRecords';

    public function handle(MediRecordsService $service): int
    {
        $this->info('Testing connection to MediRecords API...');

        $res = $service->testConnection();

        $this->table(
            ['Parameter', 'Status / Value'],
            [
                ['Connection Status', $res['status']],
                ['Environment Mode', $res['mode']],
                ['API Base URL', $res['api_endpoint']],
                ['Client ID', $res['client_id']],
                ['Authenticated', $res['authenticated'] ? 'YES' : 'NO'],
                ['Last Checked', $res['last_tested']],
            ]
        );

        return $res['authenticated'] ? self::SUCCESS : self::FAILURE;
    }
}
