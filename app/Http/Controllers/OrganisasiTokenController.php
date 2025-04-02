<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\OrganisasiToken;
use App\Models\OrganizationRole;

class OrganisasiTokenController extends Controller
{
    public function index()
    {
        $getToken = OrganisasiToken::all();
        $showorg = Organization::all();
        $showRole = OrganizationRole::all();
        $getmhs= User::where('role', 'mahasiswa')->get();
        return view('kemahasiswaan.token', compact('getToken', 'showorg', 'showRole', 'getmhs'));
        // return response()->json($getToken, 200);
    }
    public function storeToken(Request $request)
    {
        $validation = $request->validate([
            'token' => 'required',
            'receiver' => 'required',
            'creator' => 'required',
            'organisasi_id' => 'required',
            'role_id' => 'required',
            // 'status' => 'required',
            'expired' => 'required'
        ]);
        // $getLead = OrganizationRole::where('id', $validation['role_id'])->first();
        $encodeToken = OrganisasiToken::encodeToken($validation['token']);
        $data = OrganisasiToken::create([
            'token' => $encodeToken,
            'receiver' => $validation['receiver'],
            'creator' => $validation['creator'],
            'organisasi_id' => $validation['organisasi_id'],
            'role_id' => $validation['role_id'],
            // 'status' => $validation['status'],
            'expired' => $validation['expired']
        ]);
        return response()->json($data, 200);
    }
    public function redeemToken(Request $request)
    {
        $token = OrganisasiToken::encodeToken($request->token);
        $dbtoken = OrganisasiToken::where('token', $token)->first();
        if ($dbtoken->token === $token) {
            $dbtoken->status = 1;
            $dbtoken->save();
            return response()->json($dbtoken, 200);
        } else {
            return response()->json(['message' => 'Token not found'], 404);
        }

        // return response()->json($, 200);
    }
}
