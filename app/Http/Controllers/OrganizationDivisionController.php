<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationDivision;

class OrganizationDivisionController extends Controller
{
    public function index()
    {
        $divisi = OrganizationDivision::all();
        return response()->json($divisi, 200);
    }
    public function storeDivisi(Request $request)
    {
        $validation = $request->validate([
            'divisi' => 'required',
        ]);
        $divisi = OrganizationDivision::create($validation);
        $data = [
            'status' => 'success',
            'message' => 'Divisi berhasil ditambahkan',
            'data' => $divisi
        ];
        return response()->json($data, 200);
    }
    public function updateDivisi(Request $req, $id)
    {
        $divisi = OrganizationDivision::find($id);
        if ($divisi) {
            $validation = $req->validate([
                'divisi' => 'required',
            ]);
            $divisi->divisi = $validation['divisi'];
            $divisi->save();
            $data = [
                'status' => 'success',
                'message' => 'Divisi berhasil diubah',
                'data' => $divisi
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 'error',
                'message' => 'Divisi tidak ditemukan',
            ];
            return response()->json($data, 404);
        }
    }
    public function deleteDivisi($id)
    {
        $deleteDivisi = OrganizationDivision::find($id)->delete();
        $data = [
            'status' => 'success',
            'message' => 'Divisi berhasil dihapus',
        ];
        return response()->json($data, 200);
    }
}
