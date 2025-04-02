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
    <x-table tableTitle="Daftar Mahasiswa" :tableHeaders="['No', 'Nama Mahasiswa', 'NIM', 'Email', 'Password', 'Action']" modalId="tambah">
        @foreach ($getmhs as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->password }}</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="icon-base bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $item->id }}"><i class="icon-base bx bx-edit-alt me-1"></i>
                                Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $item->id }}"><i class="icon-base bx bx-trash me-1"></i>
                                Delete</a>
                        </div>
                    </div>
                </td>
        @endforeach
        </tr>
    </x-table>
    <x-modal modalTitle="Tambah Mahasiswa" modalId="tambah">
        <form action="{{ route('save.mahasiswa') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="name" name="name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-modal>
    @foreach ($getmhs as $item)
        <x-modal modalTitle="Tambah Mahasiswa" modalId="edit{{ $item->id }}">
            <form action="{{ route('update.mahasiswa', $item->name) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}"
                        autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" autocomplete="off"
                        value="{{ $item->nim }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                        value="{{ $item->email }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-modal>
    @endforeach
    @foreach ($getmhs as $item)
        <x-modal modalId="delete{{ $item->id }}" modalTitle="Edit Organisasi">
            <form action="{{ route('delete.mahasiswa', $item->name) }}" method="POST">
                @csrf
                @method('delete')
                <div class="mb-3">
                    <p class="text-center">yakin ingin menghapus organisasi?</p>
                </div>
                <div class="d-flex justify-content-center gap-4">

                    <button type="submit" class="btn btn-primary">simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batalkan</button>
                </div>
            </form>
        </x-modal>
    @endforeach
@endsection
