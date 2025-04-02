<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\OrganisasiToken;
use App\Http\Controllers\Controller;

class KemahasiswaanController extends Controller
{
    public function index()
    {
        $allToken = OrganisasiToken::count();
        $allOrg = Organization::count();
        $allmhs = User::where('role', 'mahasiswa')->count();
        return view('kemahasiswaan.index')->with([
            'allToken' => $allToken,
            'allOrg' => $allOrg,
            'allmhs' => $allmhs
        ]);
    }
    public function showMahasiswa()
    {
        $getmhs = User::where('role', 'mahasiswa')->get();
        return view('kemahasiswaan.mahasiswa', compact('getmhs'));
    }
    public function storemahasiswa(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nim' => 'required'
        ]);
        $password = bcrypt('password');
        $role = 'mahasiswa';
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'password' => $password,
            'role' => $role
        ]); 
        return redirect()->route('kemahasiswaan.mahasiswa')->with('success', 'Data Mahasiswa Berhasil Ditambahkan');
        // return response()->json($request->all());
    }
    public function updateMahasiswa(Request $request, $nama) {
        // return response()->json($request->all());
        $getmhs = User::where('name', $nama)->first();
        $getmhs->update([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim
        ]);
        return redirect()->route('kemahasiswaan.mahasiswa')->with('success', 'Data Mahasiswa Berhasil Diubah');
    }
    public function deleteMahasiswa(Request $request, $nama) {
        $deletemhs = User::where('name', $nama)->delete();
        return redirect()->route('kemahasiswaan.mahasiswa')->with('success', 'Data Mahasiswa Berhasil Dihapus');
    }
}
