<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Users;
use Illuminate\Http\Request;

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
        $calon = Kandidat::join('users', 'users.id', '=', 'kandidat.id_user')
            ->get(['users.nim', 'users.nama', 'kandidat.*']);
        return view('kandidat', ['calon' => $calon]);
    }

    public function inputKand()
    {
        $mhs = Users::select('id', 'nim', 'nama')->get();
        return view('kandidat.inputKandidat', ['calon' => $mhs]);
    }

    public function editKand($id)
    {
        $data = Kandidat::find($id);
        $dataMhs = Users::select('id', 'nim', 'nama')->get();
        return view('kandidat.editKandidatForm', ['send' => $data, 'dataMhs' => $dataMhs]);
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
}
