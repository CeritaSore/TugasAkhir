<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    //
    public function index(){
        $organisasi = Organisasi::all();
        $pengurus = Pengurus::all();
        return view("index", compact("organisasi","pengurus"));
    }
}
