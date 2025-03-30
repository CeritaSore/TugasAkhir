@extends('layout')
@section('navbar')
    <x-navbar></x-navbar>
@endsection
@section('sidebar')
    <x-sidebar :menu="[
        ['name' => 'Dashboard', 'routename' => 'kemahasiswaan.index'],
        ['name' => 'Token', 'routename' => 'kemahasiswaan.token'],
        ['name' => 'Organisasi', 'routename' => 'kemahasiswaan.organisasi'],
        ['name' => 'Mahasiswa', 'routename' => 'kemahasiswaan.mahasiswa'],
    ]"></x-sidebar>
@endsection
