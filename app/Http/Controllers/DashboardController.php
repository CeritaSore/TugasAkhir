<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Orgtoken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $alltoken = Orgtoken::all();
        return view("dashboard", compact('alltoken'));
    }
   
}
