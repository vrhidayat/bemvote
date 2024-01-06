<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class mhsController extends Controller
{
    // public function simpanMhs(Request $request)
    // {
    //     $file = $request->file('foto');
    //     // Check if a file is uploaded before processing it
    //     if ($file) {
    //         $filename = time() . "-" . $file->getClientOriginalName(); //* get file name
    //         $foldername = 'foto'; //* folder name
    //         $file->move($foldername, $filename); //* moving file to folder
    //         $pathPublic = $foldername . "/" . $filename; //* get file path
    //     } else {
    //         // If no file is uploaded, set $pathPublic to null
    //         $pathPublic = null;
    //     }

    //     $message = [
    //         'nim.digits' => 'NIM harus berisi :digits digit',
    //         'nim.required' => 'NIM harus diisi',
    //         'nama.required' => 'Nama harus diisi',
    //         'id_prodi.not_in' => 'Pilih program studi',
    //         'password.required' => 'Password harus diisi'
    //     ];

    //     $validate_data = $request->validate([
    //         'nim' => 'required|digits:9|unique:mahasiswa',
    //         'nama' => 'required|regex:/^[A-Za-z\s]+$/',
    //         'id_prodi' => 'not_in:--PILIH PROGRAM STUDI--',
    //         'password' => 'required',
    //         'foto' => 'nullable'
    //     ], $message);

    //     $validate_data['foto'] =  $pathPublic;
    //     Mahasiswa::create($validate_data);

    //     return redirect("/mahasiswa");
    // }

    // public function updateMhs(Request $request)
    // {
    //     $file = $request->file('foto');
    //     if (file_exists($file)) {
    //         $filename = time() . "-" . $file->getClientOriginalName(); //* get file name
    //         $foldername = 'foto'; //* folder name
    //         $file->move($foldername, $filename); //* moving file to folder
    //         $pathPublic = $foldername . "/" . $filename; //* get file path
    //     } else {
    //         $pathPublic = $request->imgPath;
    //     }

    //     Mahasiswa::where("nim", $request->nim)->update([
    //         'nim' => $request->nim,
    //         'nama' => $request->nama,
    //         'id_prodi' => $request->id_prodi,
    //         'password' => $request->password,
    //         'foto' => $pathPublic,
    //     ]);

    //     return redirect('/mahasiswa');
    // }

    // public function deleteMhs($i)
    // {
    //     $data = Mahasiswa::find($i);
    //     File::delete($data->foto);
    //     Mahasiswa::where('nim', $i)->delete();

    //     return redirect('/mahasiswa');
    // }
}
