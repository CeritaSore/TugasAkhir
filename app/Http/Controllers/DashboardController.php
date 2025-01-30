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
        $user = Auth::user();
        $notify = Orgtoken::notify($user->id);
        $hasAccess = Orgtoken::grantingAccess();
        return view('mahasiswa.dashboard', compact('notify','hasAccess'));
    }

    public function index()
    {
        return view('index');
    }
    public function indexOrganisasi()
    {
        return view('organization.index');
    }
}
