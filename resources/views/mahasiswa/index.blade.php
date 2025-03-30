@extends('layout')
@section('navbar')
    <x-navbar></x-navbar>
@endsection
@section('sidebar')
    <x-sidebar :menu="[['name' => 'Dashboard', 'routename' => 'mahasiswa.index']]"></x-sidebar>
@endsection