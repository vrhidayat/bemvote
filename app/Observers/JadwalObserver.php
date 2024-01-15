<?php

namespace App\Observers;

use App\Models\Jadwal;
use Carbon\Carbon;

class JadwalObserver
{
    public function updating(Jadwal $jadwal)
    {
        $now = Carbon::now();

        // Check if it's time to change the status to 'ongoing'
        if ($now >= $jadwal->open_vote && $jadwal->status === 'future') {
            $jadwal->status = 'ongoing';
        }

        // Check if it's time to change the status to 'closed'
        if ($now >= $jadwal->close_vote && $jadwal->status === 'ongoing') {
            $jadwal->status = 'closed';
        }
    }
    /**
     * Handle the Jadwal "created" event.
     */
    public function created(Jadwal $jadwal): void
    {
        //
    }

    /**
     * Handle the Jadwal "updated" event.
     */
    public function updated(Jadwal $jadwal): void
    {
        //
    }

    /**
     * Handle the Jadwal "deleted" event.
     */
    public function deleted(Jadwal $jadwal): void
    {
        //
    }

    /**
     * Handle the Jadwal "restored" event.
     */
    public function restored(Jadwal $jadwal): void
    {
        //
    }

    /**
     * Handle the Jadwal "force deleted" event.
     */
    public function forceDeleted(Jadwal $jadwal): void
    {
        //
    }
}
