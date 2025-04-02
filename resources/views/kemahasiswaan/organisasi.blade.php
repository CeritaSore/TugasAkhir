@php
    $status = ['aktif', 'nonaktif'];
    $tipe = ['legislatif', 'eksekutif', 'unit kegiatan'];
@endphp
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
    <x-table tableTitle="Daftar Organisasi" :tableHeaders="['No', 'Organisasi', 'Deskripsi', 'Tanggal Berdiri', 'Tipe Organisasi', 'Status Organisasi', 'Action']" modalId="tambah">
        @foreach ($organisasi as $item)
            <tr>
                <td> {{ $item->id }} </td>
                <td> {{ $item->nama }} </td>
                <td> {{ $item->deskripsi }} </td>
                <td> {{ \Carbon\Carbon::parse($item->tanggal_berdiri)->format('d M Y') }} </td>
                <td> {{ $item->tipe_organisasi }} </td>
                <td> {{ $item->status }} </td>
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
    <x-modal modalId="tambah" modalTitle="Tambah Organisasi">
        <form action="{{ route('save.organization') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal_berdiri">Tanggal Berdiri</label>
                <input type="date" class="form-control" id="tanggal_berdiri" name="tanggal_berdiri" required>
            </div>

            <div class="mb-3">
                <label for="status">Status</label>
                <select type="text" class="form-control" id="status" name="status" required>
                    <option value="#" selected>--pilih--</option>
                    @foreach ($status as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tipe_organisasi">Tipe Organisasi</label>
                <select type="text" class="form-control" id="tipe_organisasi" name="tipe_organisasi" required>
                    <option value="#" selected>--pilih--</option>
                    @foreach ($tipe as $item)
                        <option class="text-capitalize" value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-modal>
    @foreach ($organisasi as $item)
        <x-modal modalId="edit{{ $item->id }}" modalTitle="Edit Organisasi">
            <form action="{{ route('update.organization', $item->nama) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" value="{{ $item->nama }}" class="form-control" id="nama" name="nama"
                        required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $item->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_berdiri">Tanggal Berdiri</label>
                    <input type="date" class="form-control" value="{{ $item->tanggal_berdiri }}" id="tanggal_berdiri"
                        name="tanggal_berdiri" required>
                </div>

                <div class="mb-3">
                    <label for="status">Status</label>
                    <select type="text" class="form-control" id="status" name="status" required>
                        <option value="#" selected>--pilih--</option>
                        @foreach ($status as $items)
                            <option value="{{ $items }}" {{ $items === $item->status ? 'selected' : '' }}>
                                {{ $items }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipe_organisasi">Tipe Organisasi</label>
                    <select type="text" class="form-control" id="tipe_organisasi" name="tipe_organisasi" required>
                        <option value="#" selected>--pilih--</option>
                        @foreach ($tipe as $items)
                            <option class="text-capitalize" value="{{ $items }}"
                                {{ $items === $item->tipe_organisasi ? 'selected' : '' }}>{{ $items }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-modal>
    @endforeach
    @foreach ($organisasi as $item)
        <x-modal modalId="delete{{ $item->id }}" modalTitle="Edit Organisasi">
            <form action="{{ route('delete.organization', $item->nama) }}" method="POST">
                @csrf
                @method('delete')
                <div class="mb-">
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
