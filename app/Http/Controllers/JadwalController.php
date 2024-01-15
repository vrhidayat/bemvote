<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JadwalController extends Controller
{
    public function simpanJadwal(Request $request)
    {
        $elect_date = $request->input('elect_date');
        $openDate = $request->open_date;
        $openTime = $request->open_time;
        $closeVote = $request->close_vote;

        $fPemilihan = Carbon::parse($elect_date)->format('Y-m-d');
        $fOpenVote = Carbon::parse("$openDate $openTime")->format('Y-m-d H:i:s');
        $fCloseVote = Carbon::parse($closeVote)->format('Y-m-d H:i:s');

        Jadwal::create([
            'title' => $request->title,
            'elect_date' => $fPemilihan,
            'open_vote' => $fOpenVote,
            'close_vote' => $fCloseVote
        ]);

        return redirect("/jadwal");
    }

    public function updateJadwal(Request $request)
    {
        $elect_date = $request->input('elect_date');
        $openDate = $request->open_date;
        $openTime = $request->open_time;
        $closeVote = $request->close_vote;

        $fPemilihan = Carbon::parse($elect_date)->format('Y-m-d');
        $fOpenVote = Carbon::parse("$openDate $openTime")->format('Y-m-d H:i:s');
        $fCloseVote = Carbon::parse($closeVote)->format('Y-m-d H:i:s');


        Jadwal::where('id', $request->id)->update([
            'title' => $request->title,
            'elect_date' => $fPemilihan,
            'open_vote' => $fOpenVote,
            'close_vote' => $fCloseVote
        ]);

        return redirect('/jadwal');
    }

    public function deleteJadwal($i)
    {
        $data = Jadwal::find($i);
        File::delete($data->foto);
        Jadwal::where('id', $i)->delete();

        return redirect('/jadwal');
    }
}
