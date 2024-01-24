<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function simpanUsr(Request $request)
    {
        $file = $request->file('foto');
        // Check if a file is uploaded before processing it
        if ($file) {
            $filename = time() . "-" . $file->getClientOriginalName(); //* get file name
            $foldername = 'foto'; //* folder name
            $file->move($foldername, $filename); //* moving file to folder
            $pathPublic = $foldername . "/" . $filename; //* get file path
        } else {
            // If no file is uploaded, set $pathPublic to null
            $pathPublic = null;
        }

        $message = [
            'nim.digits' => 'NIM harus berisi :digits digit',
            'nim.required' => 'NIM harus diisi',
            'nama.required' => 'Nama harus diisi',
            'id_prodi.not_in' => 'Pilih program studi',
            'ogPassword.required' => 'Password harus diisi',
            'role.required' => 'Role harus diisi',
        ];

        $validate_data = $request->validate([
            'nim' => 'required|digits:9|unique:users',
            'nama' => 'required|regex:/^[A-Za-z\s]+$/',
            'id_prodi' => 'not_in:--PILIH PROGRAM STUDI--',
            'ogPassword' => 'required',
            'foto' => 'nullable',
            'role' => 'required'
        ], $message);
        $validate_data['foto'] =  $pathPublic;
        $validate_data['password'] =  bcrypt($request->input('ogPassword'));
        User::create($validate_data);

        return redirect("/user");
    }

    public function updateUsr(Request $request)
    {
        $file = $request->file('foto');
        $pathPublic = $request->imgPath;

        // Validation
        $validator = Validator::make($request->all(), [
            'nim' => 'required|digits:9',
            'nama' => 'required',
            'id_prodi' => 'required',
            'ogPassword' => 'required',
            'password' => 'required',
            'role' => 'required',
            'foto' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($file) {
            $filename = time() . "-" . $file->getClientOriginalName(); //* get file name
            $foldername = 'foto'; //* folder name
            $file->move($foldername, $filename); //* moving file to folder
            $pathPublic = $foldername . "/" . $filename; //* get file path
        }

        User::where('id', $request->id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'id_prodi' => $request->id_prodi,
            'ogPassword' => $request->password,
            'password' => bcrypt($request->password),
            'foto' => $pathPublic,
            'role' => $request->role
        ]);

        return redirect('/user');
    }

    public function deleteUsr($i)
    {
        $data = User::find($i);
        File::delete($data->foto);
        User::where('id', $i)->delete();

        return redirect('/user');
    }
}
