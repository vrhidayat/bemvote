<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function getEvents(Request $request)
    {
        $jadwal = Jadwal::all();

        $events = [];
        foreach ($jadwal as $item) {
            $events[] = [
                'judul' => $item->judul, // Set a meaningful judul
                'start' => $item->tanggal_pemilihan, // Start date
                'end' => $item->close_vote, // End date
                'color' => $this->getRandomColor(), // Use your function to get a random color
            ];
        }

        return response()->json($events);
    }

    private function getRandomColor()
    {
        // Implement your logic to get a random color here
        // You can use the same logic as in your JavaScript code
        $colors = ['#ecbe3d', '#f17c55', '#99a6f3', '#ec4f3d', '#8eca77', '#f1a436', '#34c2d0', '#B2D553', '#40cea6', '#f5678b', '#98c452', '#a770b5', '#f1a436', '#35b3c0'];
        $randomIndex = array_rand($colors);

        return $colors[$randomIndex];
    }
    //
}
