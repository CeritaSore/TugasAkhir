@extends('layout')
@section('navbar')
    <x-navbar></x-navbar>
@endsection
@section('sidebar')
    <x-sidebar :menu="[
        ['name' => 'Dashboard', 'routename' => 'organisasi.index',],
        ['name' => 'Pengurus', 'routename' => 'organisasi.pengurus'],
        ['name' => 'Kegiatan', 'routename' => 'organisasi.kegiatan'],
        ['name' => 'Program', 'routename' => 'organisasi.program'],
        ['name' => 'Anggaran', 'routename' => 'organisasi.anggaran'],
    ]"></x-sidebar>
@endsection