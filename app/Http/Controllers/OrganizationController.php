<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Orgcoreteam;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    //
    public function index()
    {
        $menu = ['Pengurus dan Staff', 'Keuangan', 'Kegiatan dan Acara'];
        $totalCoreTeam = Organization::countCoreTeam();
        return view('organization.index', compact('menu', 'totalCoreTeam'));
    }
    public function event()
    {
        return view('organization.event.index');
    }
}
