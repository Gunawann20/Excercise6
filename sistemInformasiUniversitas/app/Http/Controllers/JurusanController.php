<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    //
    public function index()
    {
        $jurusans = Jurusan::all();
        $jurusans = DB::table('jurusans')
                    ->orderBy('nama_jurusan','asc')
                    ->get();
        

        return view('jurusan')->with('jurusans',$jurusans);
    }
    public function tambah(Request $request)
    {
        $newJurusan = new Jurusan();

        $newJurusan->nama_jurusan = $request->nama_jurusan;
        $newJurusan->save();

        return redirect('/jurusan');
    }
    public function destroy ($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $jurusan->delete();
        return redirect('/jurusan');
    }
}
