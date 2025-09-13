<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CronData;
use Carbon\Carbon;

class CronDataJob extends Command
{
    protected $signature = 'cron:data-job';
    protected $description = 'Auto create and delete CronData';

    public function handle()
    {
        $data = CronData::create([
            'name' => 'Auto Entry ' . now(),
            'created_at' => now(),
        ]);
        $this->info('Created: ' . $data->name);

        $limit = Carbon::now()->subMinute();
        $old = CronData::where('created_at', '<', $limit)->get();
        $this->info("Matched old records: " . $old->count());

        $deleted = CronData::where('created_at', '<', $limit)->delete();
        $this->info("Deleted $deleted old records");
    }
}
