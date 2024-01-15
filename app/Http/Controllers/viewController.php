<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kandidat;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class viewController extends Controller
{
    public function signIn()
    {
        return view('signIn');
    }

    public function dash()
    {
        return view('dashboard');
    }

    public function kandidat()
    {
        $data = Kandidat::join('users', 'users.id', '=', 'kandidat.id_user')
            ->join('jadwal', 'jadwal.id', '=', 'kandidat.id_jadwal')
            ->get(['users.nim', 'users.nama', 'kandidat.*', 'jadwal.*']);
        return view('kandidat', ['data' => $data]);
    }

    public function inputKand()
    {
        $mhs = Users::select('id', 'nim', 'nama')->get();
        $jdwl = Jadwal::select('id', 'title', 'elect_date')->get();
        return view('kandidat.inputKandidat', ['mhs' => $mhs, 'jdwl' => $jdwl]);
    }

    public function editKand($id)
    {
        $data = Kandidat::find($id);
        $dataMhs = Users::select('id', 'nim', 'nama')->get();
        $jdwl = Jadwal::select('id', 'title', 'elect_date')->get();
        return view('kandidat.editKandidatForm', ['send' => $data, 'dataMhs' => $dataMhs, 'jdwl' => $jdwl]);
    }

    public function user()
    {
        $user = Users::join('prodi', 'users.id_prodi', '=', 'prodi.id_prodi')
            ->get(['users.*', 'prodi.*']);
        // $user = user::with(['prodi']);
        return view('user', ['user' => $user]);
    }

    public function inputUsr()
    {
        $a = Prodi::all();
        return view('users.inputUsers', ['collection' => $a]);
    }

    public function editUsr($id)
    {
        $data = Users::find($id);
        $dataProdi = Prodi::all();
        return view('users.editUsersForm', ['send' => $data, 'dataProdi' => $dataProdi]);
    }

    public function jadwal()
    {
        $jadwal = Jadwal::all();
        return view('jadwal', ['jadwal' => $jadwal]);
    }

    public function inputJadwal()
    {
        return view('jadwal.inputJadwal');
    }

    public function editJadwal($id)
    {
        $data = DB::table('jadwal')->where('id', $id)->first();
        // dd($data);
        // die();
        // $data = Jadwal::find($id);
        // Assuming $data->dateTime is the field containing the date and time
        $dateTime = Carbon::parse($data->open_vote);

        // Extracting date and time components
        $date = $dateTime->toDateString();
        $time = $dateTime->toTimeString();

        // dd($date, $time, $fCloseVote);
        return view('jadwal.editJadwalForm', [
            'send' => $data,
            'date' => $date,
            'time' => $time
        ]);
    }

    public function calendar()
    {
        return view('calendar_schedule');
    }

    public function vote()
    {
        $data = Jadwal::all();
        return view('vote', ['data' => $data]);
    }
}
