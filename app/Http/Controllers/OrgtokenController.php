<?php

namespace App\Http\Controllers;

use id;
use App\Models\Orgrole;
use App\Models\Orgtoken;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrgtokenController extends Controller
{
    public function index()
    {
        $org = Organization::all();
        $users = User::where('role', 'mahasiswa')->get();
        $role = Orgrole::all();
        return view('kemahasiswaan.token', compact('org', 'role', 'users'));
    }
    public function storeToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'nim' => 'required',
            'organisasi' => 'required',
            'role' => 'required',
            'expired' => 'required',
        ]);
        $getuser = User::where('nim', $request->nim)->first();
        $randomtoken = base64_encode($request->token);
        $orgtoken = Orgtoken::create([
            'token' => $randomtoken,
            'created_for' => $getuser->id,
            'created_by' => Auth::user()->id,
            'roles_id' => $request->role,
            'organization_id' => $request->organisasi,
            'expired_at' => $request->expired,
        ]);
        return redirect()->route('dashboard')->with('success', 'token didaftarkan');
    }
    public function showredeem()
    {

        return view('redeem');
    }
    public function storeRedeem(Request $request)
    {
        $request->validate([
            'redeemtoken' => 'required',
        ]);

        $getdata = Orgtoken::where('created_for', Auth::user()->id)
            ->where('status', 0)
            ->get();
        foreach ($getdata as $data) {
            $dekrip = base64_decode($data->token);
            if ($dekrip == $request->redeemtoken) {
                $data->status = 1;
                $data->save();
                return response()->json('token telah digunakan');
            }
            return response()->json('token tidak cocok');
        }
    }
}
