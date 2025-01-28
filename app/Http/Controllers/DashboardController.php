<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Orgtoken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexKema()
    {
        if (Auth::user()->role === 'kemahasiswaan') {
            $user = Auth::user();
            $org = Organization::all();
            $token = Orgtoken::with(['creator', 'receiver'])->get();


            return view('kemahasiswaan.dashboard', compact('org', 'user', 'token'));
        }
    }
    public function indexMahasiswa()
    {
        $viewData = [
            'showRedeemButton' => false // Default: tidak menampilkan tombol
        ];
        if (Auth::user()->role === 'mahasiswa') {
            $user = Auth::user();
            $token = Orgtoken::notify(Auth::user()->id);
            if ($token) {
                $viewData['showRedeemButton'] = true;
            }
            // return view('mahasiswa.dashboard', $viewData);
            return view('mahasiswa.dashboard', $viewData, compact('user'));
        }
    }
    public function index()
    {
        return view('index');
    }
    // public function dashboardRedirect()
    // {
    //     if(Auth::check()){
    //         $checkrole = Auth::user()->role;
    //         return redirect()->route(`dashboard.{$checkrole}`);

    //     }
    // }
}

// $viewData = [
//     'showRedeemButton' => false // Default: tidak menampilkan tombol
// ];
// $alltoken = Orgtoken::all();
// if (Auth::check() && Auth::user()->role === 'mahasiswa') {
//     $token = Orgtoken::notify(Auth::user()->id);
//     if ($token) {
//         $viewData['showRedeemButton'] = true;
//     }
//     return view('mahasiswa.dashboard', $viewData);
// }

// return view('kemahasiswaan.dashboard', $viewData, compact('alltoken'));