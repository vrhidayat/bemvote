<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateJadwalStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-jadwal-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update jadwal status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('jadwal')
            ->update([
                'status' => DB::raw("CASE
                                      WHEN NOW() BETWEEN open_vote AND close_vote THEN 'ongoing'
                                      WHEN NOW() > close_vote THEN 'closed'
                                      ELSE 'future'
                                    END"),
            ]);

        $this->info('Jadwal status updated successfully.');
    }
}
