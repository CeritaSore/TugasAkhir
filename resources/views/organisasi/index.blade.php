@extends('layout')
@section('navbar')
    <x-navbar></x-navbar>
@endsection
@section('sidebar')
    <x-sidebar :menu="[
        ['name' => 'Dashboard', 'routename' => 'organisasi.index'],
        ['name' => 'Pengurus', 'routename' => 'organisasi.pengurus'],
        ['name' => 'Kegiatan', 'routename' => 'organisasi.kegiatan'],
        ['name' => 'Program', 'routename' => 'organisasi.program'],
        ['name' => 'Anggaran', 'routename' => 'organisasi.anggaran'],
    ]"></x-sidebar>
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-6 col-lg-4  col-md-6  mb-5">
            <x-card cardIcon="money" cardTitle="Pengurus" cardSubtitle="{{ $pengurus }}"></x-card>
        </div>
        <div class="col-xxl-6 col-lg-4  col-md-6 mb-5">
            <x-card cardIcon="money" cardTitle="Kegiatan" cardSubtitle="{{ $kegiatan }}"></x-card>
        </div>
        <div class="col-xxl-6 col-lg-4  col-md-6 mb-5">
            <x-card cardIcon="money" cardTitle="Program" cardSubtitle="{{ $program }}"></x-card>
        </div>
        <div class="col-xxl-6 col-lg-4  col-md-6 mb-5">
            <x-card cardIcon="money" cardTitle="Anggaran" cardSubtitle="{{ $anggaran }}"></x-card>
        </div>

    </div>
@endsection
