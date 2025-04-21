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

        {{-- <div class="col-lg-4 col-md-12">
            <x-card cardTitle="Total Pengajuan RAB" cardSubtitle="100" cardIcon=""></x-card>
        </div> --}}
        <div class="col-lg-12 mt-5">
            <x-navtab>

            @section('rab')
                <x-table tableTitle="Daftar Rancangan" :tableHeaders="['NO', 'nama', 'pengaju', 'divisi', 'action']" modalId="tambahdata">
                    @foreach ($budgets as $item)
                        <tr>
                            <td>{{ $no = 1 }}</td>
                            <td>{{ $item->nama_anggaran }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->divisi->divisi }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item"
                                            href="{{ route('show.anggaran.detail', str_replace(' ', '-', $item->nama_anggaran)) }}"><i
                                                class="icon-base bx bx-edit-alt me-1"></i>buat list kebutuhan</a>
                                        <a class="dropdown-item" href="{{ route('show.anggaran', $item->id) }}"><i
                                                class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#deletedata{{ $item->id }}"><i
                                                class="icon-base bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                    @endforeach
                    </tr>
                </x-table>
            @endsection
            @section('lak')
                halo
            @endsection

        </x-navtab>
    </div>
    <x-modal modalTitle="Tambah data" modalId="tambahdata">
        <form action="{{ route('save.anggaran') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama">Nama Anggaran</label>
                <input type="text" class="form-control" id="nama" name="nama_anggaran">
            </div>
            <div class="mb-3">
                <label for="pengaju">Pengaju</label>
                <input type="text" class="form-control" id="pengaju" name="pengaju">
            </div>
            <div class="mb-3">
                <label for="divisi">Divisi</label>
                <input type="text" class="form-control" id="divisi" name="divisi">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">simpan</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">batal</button>
            </div>
        </form>
    </x-modal>
    @foreach ($budgets as $item)
        <x-modal modalId="deletedata{{ $item->id }}" modalTitle="Delete Data">
            <p>yakin ingin menghapus data "{{ $item->nama_anggaran }}"</p>
            <form action="{{ route('delete.anggaran', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </x-modal>
    @endforeach

@endsection
