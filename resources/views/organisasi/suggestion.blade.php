@php
    $divisi = ['Kreatif dan desain', 'hukum', 'bendahara', 'sekretariat'];
    $role = ['pimpinan divisi(PI)', 'Staff', 'wakil'];
@endphp
@extends('layout2')
@section('navbar')
    <x-navbar></x-navbar>
@endsection
@section('card')
    <div class="col-12">

        <form action="{{ route('organisasi.initial-role-data.save') }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <x-card2 cardTitle="saran divisi">
                    @foreach ($divisi as $div)
                        <div class="mb-3 form-check">
                            <input class="form-check-input" name="divisi[]" type="checkbox" value="{{ $div}}" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1"> {{ $div }}</label>
                        </div>
                    @endforeach

                </x-card2>
                <x-card2 cardTitle="saran role">
                    @foreach ($role as $rol)
                        <div class="mb-3 form-check">
                            <input class="form-check-input" name="role[]" type="checkbox" value="{{ $rol}}" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1"> {{ $rol }}</label>
                        </div>
                    @endforeach
                </x-card2>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-primary" type="submit">simpan</button>
            </div>
        </form>
    </div>
@endsection
