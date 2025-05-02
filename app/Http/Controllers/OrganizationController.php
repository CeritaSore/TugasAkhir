<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Expense;
use App\Models\Organization;
use App\Models\OrganizationCoreTeam;
use App\Models\OrganizationDivision;
use App\Models\OrganizationProgram;
use App\Models\OrganizationRole;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

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
            // 'foto' => 'nullable',
            'tanggal_berdiri' => 'required',
            'status' => 'required',
            'tipe_organisasi' => 'required',
        ]);
        $save = Organization::create($validation);
        // return response()->json($save);
        return redirect()->route('kemahasiswaan.organisasi');
    }
    public function updateOrganization(Request $request, $nama)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            // 'foto' => 'nullable',
            'tanggal_berdiri' => 'required',
            'status' => 'required',
            'tipe_organisasi' => 'required',
        ]);
        $getdata = Organization::where('nama', $nama)->first();
        $getdata->nama = $validation['nama'];
        $getdata->deskripsi = $validation['deskripsi'];
        // $getdata->foto = $validation['foto'];
        $getdata->tanggal_berdiri = $validation['tanggal_berdiri'];
        $getdata->status = $validation['status'];
        $getdata->tipe_organisasi = $validation['tipe_organisasi'];
        $getdata->save();
        return redirect()->route('kemahasiswaan.organisasi');
        // return response()->json($getdata, 200);
    }
    public function deleteOrganization(Request $request, $nama)
    {
        $delete = Organization::where('nama', $nama)->delete();
        $data = [
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ];
        return redirect()->route('kemahasiswaan.organisasi');
        // return response()->json($data, 200);
    }
    #area dashboard
    public function showOrganisasi()
    {
        $organisasi = Organization::all();
        $pengurus = OrganizationCoreTeam::count();
        $kegiatan = Event::count();
        $program = OrganizationProgram::count();
        // $anggaran = Expense::count();
        $data = [
            'status' => 'success',
            'organisasi' => $organisasi,
        ];
        // return response()->json($data);
        return view('organisasi.index', compact('organisasi', 'pengurus', 'kegiatan', 'program'));
    }
    public function showProgram()
    {
        return view('organisasi.program');
    }
    public function showKegiatan()
    {
        return view('organisasi.kegiatan');
    }
    
    public function showPengurus()
    {
        return view('organisasi.pengurus');
    }
    public function showDivisi()
    {
        return view('organisasi.divisi');
    }
    public function showRole()
    {
        return view('organisasi.role');
    }
    public function showEvent()
    {
        return view('organisasi.event');
    }
    public function showPendaftaran()
    {
        return view('organisasi.pendaftaran');
    }
    public function showJawaban()
    {
        return view('organisasi.jawaban');
    }
    public function showToken()
    {
        return view('organisasi.token');
    }
    public function showDashboard()
    {
        return view('organisasi.dashboard');
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
    public function initialRoleData()
    {
        return view('organisasi.suggestion');
    }
    public function savesuggest(Request $request)
    {
        $validation = $request->validate([
            'divisi' => 'required|array',
            'divisi.*' => 'string',
            'role' => 'required|array',
            'role.*' => 'string',
        ]);
        foreach ($validation['divisi'] as $divisiItem) {
            $saveDivisi = OrganizationDivision::create([
                'divisi' => $divisiItem,
            ]);
        }

        foreach ($validation['role'] as $roleItem) {
            $saveRole = OrganizationRole::create([
                'role' => $roleItem,
            ]);
        }

        $data = [
            'status' => 'success',
            'data' => [$saveDivisi, $saveRole],
        ];
        // return response()->json($data, 200);
        return redirect()->route('organisasi.index');
    }
}
