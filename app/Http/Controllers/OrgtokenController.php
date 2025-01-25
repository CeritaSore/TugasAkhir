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
<<<<<<< HEAD
        return view('token', compact('org', 'role', 'users'));
=======
        return view('token', compact('org', 'role','users'));
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
    }
    public function storeToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
<<<<<<< HEAD
            'nim' => 'required',
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
            'organisasi' => 'required',
            'role' => 'required',
            'expired' => 'required',
        ]);
<<<<<<< HEAD
        $getuser = User::where('nim', $request->nim)->first();
        $randomtoken = base64_encode($request->token);
        $orgtoken = Orgtoken::create([
            'token' => $randomtoken,
            'created_for' => $getuser->id,
            'created_by' => Auth::user()->id,
            'roles_id' => $request->role,
            'organization_id' => $request->organisasi,
            'expired_at' => $request->expired,
=======
        $randomtoken = base64_encode($request->token);
        $orgtoken = Orgtoken::create([
            'token' => $randomtoken,
            'expired_at' => $request->expired,
            'organization_id' => $request->organisasi,
            'org_roles_id' => $request->role,
            'kemahasiswaan_id' => Auth::user()->id,
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
        ]);
        return redirect()->route('dashboard')->with('success', 'token didaftarkan');
    }
    public function showredeem()
    {
<<<<<<< HEAD

=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
        return view('redeem');
    }
    public function storeRedeem(Request $request)
    {
        $request->validate([
            'redeemtoken' => 'required',
        ]);

<<<<<<< HEAD
        $getdata = Orgtoken::where('created_for', Auth::user()->id)
            ->where('status', 0)
            ->get();
        foreach ($getdata as $data) {
            $dekrip = base64_decode($data->token);
            if ($dekrip == $request->redeemtoken) {
                $data->status = 1;
=======
        $getdata = Orgtoken::where('is_used', 0)->get();

        foreach ($getdata as $data) {
            $dekrip = base64_decode($data->token);
            if ($dekrip == $request->redeemtoken) {
                $data->is_used = 1;
                $data->redeemed_by = Auth::user()->id;
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
                $data->save();
                return response()->json('token telah digunakan');
            }
            return response()->json('token tidak cocok');
        }
    }
}
