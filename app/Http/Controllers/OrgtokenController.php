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
        return view('token', compact('org', 'role','users'));
    }
    public function storeToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'organisasi' => 'required',
            'role' => 'required',
            'expired' => 'required',
        ]);
        $randomtoken = base64_encode($request->token);
        $orgtoken = Orgtoken::create([
            'token' => $randomtoken,
            'expired_at' => $request->expired,
            'organization_id' => $request->organisasi,
            'org_roles_id' => $request->role,
            'kemahasiswaan_id' => Auth::user()->id,
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

        $getdata = Orgtoken::where('is_used', 0)->get();

        foreach ($getdata as $data) {
            $dekrip = base64_decode($data->token);
            if ($dekrip == $request->redeemtoken) {
                $data->is_used = 1;
                $data->redeemed_by = Auth::user()->id;
                $data->save();
                return response()->json('token telah digunakan');
            }
            return response()->json('token tidak cocok');
        }
    }
}
