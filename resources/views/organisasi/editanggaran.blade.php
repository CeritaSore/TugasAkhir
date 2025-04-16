@extends('layout2')
{{-- @section('navbar')
    <x-navbar></x-navbar>
@endsection --}}
@section('card')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Edit Data</h5>
                <div class="card-body">
                    <form action="{{ route('update.anggaran', $budgets->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Anggaran</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan Nama Anggaran" name="nama_anggaran"
                                value="{{ $budgets->nama_anggaran }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pengaju</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan Nama Pengaju" name="pengaju" value="{{ $budgets->user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Divisi</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan Nama Divisi" name="divisi" value="{{ $budgets->divisi->divisi }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
