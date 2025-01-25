<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Organization;
use App\Models\Orgtoken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Http\Request;
>>>>>>> 47b3a8f (update repo & creating login)

class DashboardController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $viewData = [
            'showRedeemButton' => false // Default: tidak menampilkan tombol
        ];
        $alltoken = Orgtoken::all();
        if (Auth::check() && Auth::user()->role === 'mahasiswa') {
            $token = Orgtoken::notify(Auth::user()->id);
            if ($token) {
                $viewData['showRedeemButton'] = true;
            }
            return view('dashboard', $viewData);
        }

        return view('dashboard', $viewData, compact('alltoken'));
    }
    public function dashboardRedirect()
    {
        return redirect()->route('dashboard');
=======
        return view("token");
>>>>>>> 47b3a8f (update repo & creating login)
    }
}
