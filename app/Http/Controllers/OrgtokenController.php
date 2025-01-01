<?php

namespace App\Http\Controllers;

use App\Models\Orgrole;
use App\Models\Orgtoken;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrgtokenController extends Controller
{
    public function index()
    {
        $org = Organization::all();
        $role = Orgrole::all();
        return view('token', compact('org', 'role'));
    }
    public function storeToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'organisasi' => 'required',
            'role' => 'required',
            'expired' => 'required',
        ]);
        $randomtoken = Hash::make($request->token);
        $orgtoken = Orgtoken::create([
            'token' => $randomtoken,
            'expired_at' => $request->expired,
            'organization_id' => $request->organisasi,
            'org_roles_id' => $request->role,
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
            'redeemtoken' => 'required|string',
        ]);

        // Ambil semua token yang belum digunakan dari database
        $listtoken = Orgtoken::where('is_used', 0)->get();

        // Variabel untuk menandai hasil pencarian
        $isFound = false;

        // Periksa apakah token yang diinput cocok dengan salah satu hash token
        foreach ($listtoken as $token) {
            if (Hash::check($request->redeemtoken, $token->token)) {
                $isFound = true;
                break;
            }
        }

        // Tampilkan hasil token ditemukan atau tidak
        if ($isFound) {
            return response()->json([
                'status' => 'success',
                'message' => 'Token ditemukan dan valid.',
            ]);
        }
    }
}
