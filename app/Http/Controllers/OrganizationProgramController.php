<?php

namespace App\Http\Controllers;

use App\Models\OrganizationProgram;
use Illuminate\Http\Request;

class OrganizationProgramController extends Controller
{
    public function index()
    {
        $program = OrganizationProgram::all();
        $data = [
            'status' => 'success',
            'message' => 'Data program berhasil diambil',
            'data' => $program
        ];
        return view('organisasi.program',compact('program'));
        // return response()->json($data, 200);
    }
    public function storeProgram(Request $request)
    {
        $validation = $request->validate([
            'nama_program' => 'required',
            'deskripsi' => 'nullable',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tempat' => 'required',
            'anggaran' => 'required',
            'pelaksana' => 'required'
        ]);
        $program = OrganizationProgram::create($validation);
        $data = [
            'status' => 'success',
            'message' => 'Data program berhasil disimpan',
            'data' => $program
        ];
        return response()->json($data);
    }
    public function updateProgram(Request $request, $id)
    {
        $validation = $request->validate([
            'status' => 'required',
        ]);
        $program = OrganizationProgram::find($id);
        $program->status = $validation['status'];
        $program->save();
        $data = [
            'status' => 'success',
            'message' => 'Data program berhasil diupdate',
            'data' => $program
        ];
        return response()->json($data);
    }
    public function deleteProgram($id)
    {
        $program = OrganizationProgram::find($id)->delete();
        $data = [
            'status' => 'success',
            'message' => 'Data program berhasil dihapus',
            'data' => $program
        ];
        return response()->json($data);
    }
}
