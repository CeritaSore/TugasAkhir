<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganisasiToken;
use App\Http\Controllers\Controller;
use App\Models\Organization;

class KemahasiswaanController extends Controller
{
    public function index()
    {
        $allToken = OrganisasiToken::count();
        $allOrg = Organization::count();
        return view('kemahasiswaan.index')->with([
            'allToken' => $allToken,
            'allOrg' => $allOrg,
        ]);
    }
}
