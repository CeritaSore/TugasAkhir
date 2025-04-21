<?php

namespace App\Http\Controllers;

use App\Models\OrganizationCoreTeam;
use Illuminate\Http\Request;

class OrganizationCoreTeamController extends Controller
{
    public function index()
    {
        $coreteam = OrganizationCoreTeam::all();
        return response()->json($coreteam);
    }
    public function recruit(Request $request)
    {
        $validation = $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
            'organisasi_id' => 'required',
            'divisi_id' => 'nullable',
        ]);
        $coreteam = OrganizationCoreTeam::create($validation);
        $data = [
            'status' => 'success',
            'message' => 'Core team berhasil direkrut',
            'data' => $coreteam
        ];
        return response()->json($data);
    }
    public function firedOrStop($id) {
        $deleteCoreTeam = OrganizationCoreTeam::find($id)->delete();
        $data = [
            'status' => 'success',
            'message' => 'Core team berhasil diberhentikan',
        ];
        return response()->json($data);
    }
}
