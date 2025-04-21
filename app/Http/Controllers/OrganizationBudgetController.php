<?php

namespace App\Http\Controllers;

use App\Models\OrganizationBudget;
use App\Models\OrganizationBudgetsDetail;
use Illuminate\Http\Request;

class OrganizationBudgetController extends Controller
{
    public function index()
    {
        // return response()->json('selamat datang', 200);
        $budgets = OrganizationBudget::where('is_deleted', 0)->whereIn('status', ['tertunda', 'ditolak'])->get();
        $budgetsApprove = OrganizationBudget::where('is_deleted', 0)->where('status', 'disetujui')->get();
        return view('organisasi.anggaran', compact('budgets','budgetsApprove'));
    }
    public function showBudgets($id)
    {
        $budgets = OrganizationBudget::find($id);
        return view('organisasi.editanggaran', compact('budgets'));
    }
    public function updateApproval(Request $request, $id)
    {
        $approval = OrganizationBudget::find($id);
        $request->approval === "setuju" ? $approval->status = "disetujui" : $approval->status = "ditolak";
        $approval->save();
        return redirect()->route('organisasi.anggaran')->with('success', 'Anggaran berhasil disetujui');
    }
    public function showBudgetsDetail($anggaran)
    {
        $cleananggaran = str_replace('-', ' ', $anggaran);
        $budgets = OrganizationBudget::where('nama_anggaran', $cleananggaran)->first();
        $items = OrganizationBudgetsDetail::where('anggaran_id', $budgets->id)->get();
        // return response()->json($budgets, 200);
        $sumBudgets = OrganizationBudgetsDetail::where('anggaran_id', $budgets->id)->sum('total_harga');
        return view('organisasi.anggarandetail', compact('budgets', 'items', 'sumBudgets'));
    }
    public function storeBudgetsDetail(Request $request, $anggaran)
    {
        $validation = $request->validate([
            'nama_items' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'satuan_barang' => 'required|string|max:255',
            'harga_satuan' => 'required|integer',

        ]);
        $total_harga = $validation['jumlah'] * $validation['harga_satuan'];
        $storeitems = OrganizationBudgetsDetail::create([
            'nama_items' => $validation['nama_items'],
            'jumlah' => $validation['jumlah'],
            'satuan_barang' => $validation['satuan_barang'],
            'harga_satuan' => $validation['harga_satuan'],
            'total_harga' => $total_harga,
            'anggaran_id' => $anggaran
        ]);
        $budgets = OrganizationBudget::where('id', $anggaran)->first();
        return redirect()->route('show.anggaran.detail', ['anggaran' => str_replace(' ', '-', $budgets->nama_anggaran)])->with('success', 'Anggaran berhasil ditambahkan');
        // return response()->json(, 200);
    }
    public function storeBudgets(Request $request)
    {
        $validation = $request->validate([

            'nama_anggaran' => 'required|string|max:255',
            'pengaju' => 'required|integer',
            'divisi' => 'required|integer'
        ]);
        $data = OrganizationBudget::create([
            'nama_anggaran' => $validation['nama_anggaran'],
            'user_id' => $validation['pengaju'],
            'divisi_id' => $validation['divisi']
        ]);
        return redirect()->route('organisasi.anggaran')->with('success', 'Anggaran berhasil ditambahkan');
        // return response()->json([
        //     'message' => 'success',
        //     'data' => $data
        // ], 200);
    }
    public function updateBudgets(Request $request, $id)
    {
        $validation = request()->validate([
            'nama_anggaran' => 'required|string|max:255',
            'pengaju' => 'required|integer',
            'divisi' => 'required|integer'
        ]);
        $update = OrganizationBudget::find($id);
        $update->nama_anggaran = $validation['nama_anggaran'];
        $update->user_id = $validation['pengaju'];
        $update->divisi_id = $validation['divisi'];
        $update->save();
        return redirect()->route('organisasi.anggaran')->with('success', 'Anggaran berhasil ditambahkan');

        // return response()->json([
        //     'message' => 'success',
        //     'data' => $update
        // ], 200);
    }
    public function deleteBudgets($id)
    {
        $delete = OrganizationBudget::find($id);
        $delete->is_deleted = 1;
        $delete->save();
        return redirect()->route('organisasi.anggaran')->with('success', 'Anggaran berhasil ditambahkan');
        // return response()->json([
        //     'message' => 'success delete',
        // ], 200);
    }
}
