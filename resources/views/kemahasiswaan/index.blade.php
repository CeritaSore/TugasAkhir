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
@section('content')
    <div class="row">
        <x-card cardTitle="Total Token" cardSubtitle="{{ $allToken }}" cardIcon="wallet"></x-card>
        <x-card cardTitle="Jumlah Organisasi" cardSubtitle="{{ $allOrg }}" cardIcon="wallet"></x-card>
        <x-card cardTitle="Jumlah Mahasiswa" cardSubtitle="{{ $allmhs }}" cardIcon="wallet"></x-card>
    </div>
@endsection
