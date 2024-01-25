<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kandidat;
use App\Models\Prodi;
use App\Models\User as Users;
use App\Models\Voting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class viewController extends Controller
{
    public function signIn()
    {
        return view('signIn');
    }

    public function block()
    {
        return view('block');
    }

    public function dash()
    {
        if (auth()->guest()) {
            return view('signIn');
        }
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
        $mhs = Users::where('role', 'user')->select('id', 'nim', 'nama')->get();
        $jdwl = Jadwal::select('id', 'judul', 'tanggal_pemilihan')->get();
        return view('kandidat.inputKandidat', ['mhs' => $mhs, 'jdwl' => $jdwl]);
    }

    public function editKand($id)
    {
        $data = Kandidat::find($id);
        $dataMhs = Users::select('id', 'nim', 'nama')->get();
        $jdwl = Jadwal::select('id', 'judul', 'tanggal_pemilihan')->get();
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

    public function event()
    {
        $data = Jadwal::all();
        return view('event_list', ['data' => $data]);
    }

    public function getCandidate($id)
    {
        // $user = Kandidat::join('users', 'users.id', '=', 'kandidat.id_user')
        //     ->get(['users.*', 'kandidat.*']);
        $userId = Auth()->user()->id;
        $data = Kandidat::join('users', 'users.id', '=', 'kandidat.id_user')
            ->select('kandidat.*', 'users.id as id_user', 'users.nama')
            ->where('id_jadwal', $id)->get();
        if (Voting::where('id_user', $userId)->exists() && Voting::where('id_jadwal', $id)->exists()) {
            return view('vote.voted');
        } else {
            return view('vote.vote', ['data' => $data]);
        }
    }
}
