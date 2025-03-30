@extends('layout')
@section('navbar')
    <x-navbar></x-navbar>
@endsection
@section('sidebar')
    <x-sidebar :menu="[['name' => 'Dashboard', 'routename' => 'organisasi.index']]"></x-sidebar>
@endsection
