<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organisasi = Organization::all();
        $data = [
            'status' => 'success',
            'organisasi' => $organisasi,
        ];
        // return response()->json($data);
        return view('kemahasiswaan.organisasi', compact('organisasi'));
    }
    public function storeOrganization(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable',
            'tanggal_berdiri' => 'required',
            'status' => 'required',
            'tipe_organisasi' => 'required',
        ]);
        $save = Organization::create($validation);

        return response()->json($save);
    }
    public function updateOrganization(Request $request, $id)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable',
            'tanggal_berdiri' => 'required',
            'status' => 'required',
            'tipe_organisasi' => 'required',
        ]);
        $getdata = Organization::where('id', $id)->first();
        $getdata->nama = $validation['nama'];
        $getdata->deskripsi = $validation['deskripsi'];
        $getdata->foto = $validation['foto'];
        $getdata->tanggal_berdiri = $validation['tanggal_berdiri'];
        $getdata->status = $validation['status'];
        $getdata->tipe_organisasi = $validation['tipe_organisasi'];
        $getdata->save();
        return response()->json($getdata, 200);
    }
    public function deleteOrganization(Request $request, $id)
    {
        $delete = Organization::where('id', $id)->delete();
        $data = [
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ];
        return response()->json($data, 200);
    }
    #area dashboard
    public function showOrganisasi()
    {
        $organisasi = Organization::all();
        $data = [
            'status' => 'success',
            'organisasi' => $organisasi,
        ];
        return response()->json($data);
    }
    public function editOrganisasi(Request $request, $nama)
    {
        Organization::where('nama', $nama)->update($request->all());
        $data = [
            'status' => 'success',
            'message' => 'Data berhasil diupdate',
        ];
        return response()->json($data);
    }
}
