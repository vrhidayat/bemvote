<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KandidatController extends Controller
{
    public function simpanKand(Request $request)
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
            'id_user.required' => 'Nama harus diisi',
            'visi.required' => 'Visi harus diisi',
            'misi.required' => 'Misi harus diisi',
        ];

        $validate_data = $request->validate([
            'id_user' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'no_urut' => 'required',
            'foto' => 'nullable'
        ], $message);
        $validate_data['foto'] =  $pathPublic;
        Kandidat::create($validate_data);

        return redirect("/kandidat");
    }

    public function updateKand(Request $request)
    {
        $file = $request->file('foto');
        $pathPublic = $request->imgPath;

        // Validation
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'no_urut' => 'required',
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

        Kandidat::where('id', $request->id)->update([
            'id_user' => $request->id_user,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'no_urut' => $request->no_urut,
            'foto' => $pathPublic
        ]);

        return redirect('/kandidat');
    }

    public function deleteKand($i)
    {
        $data = Kandidat::find($i);
        File::delete($data->foto);
        Kandidat::where('id', $i)->delete();

        return redirect('/kandidat');
    }
}
