<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     // function index ()
    // {
    //     return "<h1>saya siswa dari controller</h1>";
    // }

    // function detail ($id)
    // {
    //     return "<h1>saya siswa dari controller dengan id $id</h1>";
    // }



    public function index()
    {
        // $data = SiswaModel::all();
        // $data = SiswaModel::orderBy('nomor_induk', 'asc')->get();
        $data = SiswaModel::orderBy('nomor_induk', 'desc')->paginate(5);
        return view('siswa/index')->with('data', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'nomor_induk' => 'required|numeric',
            'nama' => 'required',
            'nama' => 'required',
            'foto' => 'required|mimes:jpg, jpeg, png, gif'
        ],[
            'nomor_induk.required' => 'nomor induk wajib diisi',
            'nomor_induk.numeric' => 'nomor induk wajib angka',
            'nama.required' => 'nama wajib diisi',
            'alamat.required' => 'alamat wajib diisi',
            'foto.required' => 'masukkan foto',
            'foto.mimes' => 'foto wajib jpg, jpeg, png, gif'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama
        ];
        SiswaModel::create($data);
        return redirect('siswa')->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SiswaModel::where('nomor_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SiswaModel::where('nomor_induk', $id)->first();
        return view('siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nama' => 'required'
        ],[
            'nama.required' => 'nama wajib diisi',
            'alamat.required' => 'alamat wajib diisi'
        ]);
        

        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat')
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpg, jpeg, png, gif'
            ], [
                'foto.mimes' => 'foto wajib jpg, jpeg, png, gif'
            ]);
            $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data_foto = SiswaModel::where('nomor_induk', $id)->first();
        File::delete(public_path('foto') . '/' . $data_foto->foto);

        // $data = [
        //     'foto' => $foto_nama
        // ];
        $data['foto'] = $foto_nama;
        }

        SiswaModel::where('nomor_induk', $id)->update($data);
        return redirect('/siswa')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SiswaModel::where('nomor_induk', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);

        SiswaModel::where('nomor_induk', $id)->delete();
        return redirect('/siswa')->with('success', 'berhasil hapus data');
    }
}
