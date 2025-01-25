<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
use App\Models\Organization;
use App\Models\Orgtoken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> 47b3a8f (update repo & creating login)
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b

class DashboardController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
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
=======
        $alltoken = Orgtoken::all();
        return view("dashboard", compact('alltoken'));
    }
    public function dashboardRedirect(){
        return redirect()->route('dashboard');
    }
   
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
}
