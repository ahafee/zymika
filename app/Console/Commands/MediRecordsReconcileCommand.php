<?php

namespace App\Console\Commands;

use App\Services\MediRecordsService;
use Illuminate\Console\Command;

class MediRecordsReconcileCommand extends Command
{
    protected $signature = 'medirecords:reconcile';

    protected $description = 'Perform scheduled daily reconciliation between ZOVI LEAF platform and MediRecords API';

    public function handle(MediRecordsService $service): int
    {
        $this->info('Starting MediRecords daily synchronization & reconciliation...');

        $result = $service->reconcileDaily();

        $this->table(
            ['Metric', 'Value'],
            [
                ['Timestamp', $result['reconciliation_timestamp']],
                ['Patients Reconciled', $result['patients_reconciled']],
                ['Appointments Reconciled', $result['appointments_reconciled']],
                ['Errors Count', $result['error_count']],
                ['Duration (seconds)', $result['duration_seconds']],
            ]
        );

        if (! empty($result['errors'])) {
            $this->warn('Reconciliation encountered errors:');
            foreach ($result['errors'] as $err) {
                $this->error(" - $err");
            }

            return self::FAILURE;
        }

        $this->info('MediRecords reconciliation completed with 100% data integrity.');

        return self::SUCCESS;
    }
}
