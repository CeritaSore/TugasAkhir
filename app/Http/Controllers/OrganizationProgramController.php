<?php

namespace App\Http\Controllers;

use App\Models\OrganizationBudget;
use App\Models\OrganizationProgram;
use Illuminate\Http\Request;

class OrganizationProgramController extends Controller
{
    public function index()
    {
        $program = OrganizationProgram::with('budgets')->where('is_deleted', false)->get();

        // return response()->json($program->budgets->jumlah_anggaran);
        $data = [
            'status' => 'success',
            'message' => 'Data program berhasil diambil',
            'data' => [
                'program' => $program,
                'anggaran' => OrganizationBudget::with('proker')->get()
            ]
        ];
        return view('organisasi.program', compact('program'));
        // return response()->json($data, 200);
    }
    public function storeProgramAndBudgets(Request $request)
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
        $program = OrganizationProgram::create([
            'nama_program' => $validation['nama_program'],
            'deskripsi' => $validation['deskripsi'],
            'tanggal_mulai' => $validation['tanggal_mulai'],
            'tanggal_selesai' => $validation['tanggal_selesai'],
            'tempat' => $validation['tempat'],
            'pelaksana' => $validation['pelaksana'],
        ]);
        $anggaran  = OrganizationBudget::create([
            'jumlah_anggaran' => $validation['anggaran'],
            'program_id' => $program->id,
        ]);

        $data = [
            'status' => 'success',
            'message' => 'Data program kerja berhasil disimpan',
            'data' => [
                'program' => $program,
                'anggaran' => $anggaran
            ]
        ];
        return redirect()->route('organisasi.program')->with('success', 'Data berhasil disimpan');
        // return response()->json($data, 200);
    }

    public function showProgram($namaprogram)
    {
        $showPrograms = OrganizationProgram::where('nama_program', $namaprogram)->first();
        return view('organisasi.programedit', compact('showPrograms'));
    }
    public function showProgramStatus($namaprogram)
    {
        $showPrograms = OrganizationProgram::where('nama_program', $namaprogram)->first();
        return view('organisasi.programstatus', compact('showPrograms'));
    }
    // public function updateProgram(Request $request, $namaprogram)
    // {
    //     $validation = $request->validate([
    //         'nama_program' => 'required',
    //         'deskripsi' => 'nullable',
    //         'tanggal_mulai' => 'required|date',
    //         'tanggal_selesai' => 'required|date',
    //         'tempat' => 'required',
    //         'anggaran' => 'required',
    //         'pelaksana' => 'required'
    //     ]);
    //     $program = OrganizationProgram::where('nama_program', $namaprogram)->update($validation);
    //     $budgets = OrganizationBudget::where('program_id', $program->id)->update('jumlah_anggaran', $validation['anggaran']);
    //     $data = [
    //         'status' => 'success',
    //         'message' => 'Data program berhasil diupdate',
    //         'data' => $program
    //     ];
    //     return response()->json($data);
    // }
    public function updateProgram(Request $request, $namaprogram)
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

        // Ambil dulu objek program
        $program = OrganizationProgram::where('nama_program', $namaprogram)->first();

        // Cek apakah program ditemukan
        if ($program) {
            $program->update($validation);

            // Update anggaran terkait berdasarkan program_id
            OrganizationBudget::where('program_id', $program->id)->update(['jumlah_anggaran' => $validation['anggaran']]);

            // Menyiapkan response dengan data program terbaru
            $data = [
                'status' => 'success',
                'message' => 'Data program berhasil diperbarui',
                'data' => $program
            ];
        } else {
            // Jika program tidak ditemukan, beri response gagal
            $data = [
                'status' => 'error',
                'message' => 'Program tidak ditemukan'
            ];
        }

        // return response()->json($data);
        return redirect()->route('organisasi.program')->with('success', $data['message']);
    }
    public function updateStatus(Request $request, $namaprogram)
    {
        $validation = $request->validate([
            'status' => 'required',
        ]);
        $program = OrganizationProgram::where('nama_program', $namaprogram)->first();
        $program->status = $validation['status'];
        $program->save();
        $data = [
            'status' => 'success',
            'message' => 'Status berhasil diupdate',
            'data' => $program
        ];
        // return response()->json($data);
        return redirect()->route('organisasi.program')->with('success', $data['message']);
    }
    public function deleteProgram($namaprogram)
    {
        $program = OrganizationProgram::where('nama_program', $namaprogram)->first();
        $program->is_deleted = true;
        $program->save();
        $data = [
            'status' => 'success',
            'message' => 'Data program berhasil dihapus',
            'data' => $program
        ];
        // return response()->json($data);
        return redirect()->route('organisasi.program')->with('success', $data['message']);
    }
}
