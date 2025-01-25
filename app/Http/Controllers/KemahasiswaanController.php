<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class KemahasiswaanController extends Controller
{
    //
    public function index()
    {
        $organisasi = Organization::all();
        return view('kemahasiswaan.index', compact('organisasi'));
    }
    public function create()
    {
        return view('kemahasiswaan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'nullable',
        ]);
        $organisasi = new Organization();
        $organisasi->nama = $request->nama;
        $organisasi->tanggal_berdiri = $request->tanggal;
        $organisasi->deskripsi = $request->deskripsi;
        $organisasi->save();
        return redirect()->route('show.organisasi')->with('success', 'Organisasi berhasil ditambahkan');
    }
    public function find($id)
    {
        $status = ['aktif', 'nonaktif', 'tertunda'];
        return view('kemahasiswaan.edit', ['organisasi' => Organization::find($id), 'status' => $status]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'nullable',
        ]);
        $organisasi = Organization::find($request->id);
        $organisasi->nama = $request->nama;
        $organisasi->tanggal_berdiri = $request->tanggal;
        $organisasi->deskripsi = $request->deskripsi;
        $organisasi->save();
        return redirect()->route('show.organisasi')->with('success', 'Organisasi berhasil diubah');
    }
    // public function destroy($id)
    // {
    //     $organisasi = Organization::find($id);
    //     $organisasi->delete();
    //     return redirect()->route('show.organisasi')->with('success', 'Organisasi berhasil dihapus');
    // }   
}
