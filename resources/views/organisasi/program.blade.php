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
        <div class="col-12 col-xxl-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <x-table tableTitle="Daftar Program" :tableHeaders="[
                'no',
                'Nama Program',
                'Deskripsi',
                'Tanggal Mulai',
                'Tanggal Selesai',
                'anggaran',
                'lokasi',
                'status',
                'PIC',
                'action',
            ]" modalId="tambahProgram">
                @foreach ($program as $item)
                    <tr>
                        <td>1</td>
                        <td>{{ $item->nama_program }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ \carbon\carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                        <td>{{ \carbon\carbon::parse($item->tanggal_selesai)->format('d M Y') }}</td>
                        <td>Rp {{ number_format($item->budgets->jumlah_anggaran, 2, ',', '.') }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->pics->mahasiswa->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{ route('show.program.edit', $item->nama_program) }}"><i
                                            class="icon-base bx bx-edit-alt me-1"></i>
                                        Edit Program</a>
                                    <a class="dropdown-item"
                                        href="{{ route('show.program.status', $item->nama_program) }}"><i
                                            class="icon-base bx bx-edit-alt me-1"></i>
                                        Edit Status</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#deleteProgramm"><i class="icon-base bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </x-table>
            <x-modal modalId="tambahProgram" modalTitle="Tambah Program">
                <form action="{{ route('program.save') }}" method="post">@csrf
                    <div class="mb-3">
                        <label for="nama">Program Kerja</label>
                        <input type="text" class="form-control" id="nama" name="nama_program">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="pengaju" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="start">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start" name="tanggal_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="end">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="end" name="tanggal_selesai">
                    </div>
                    <div class="mb-3">
                        <label for="tempat">Tempat Pelaksanaan</label>
                        <input type="text" class="form-control" id="tempat" name="tempat">
                    </div>
                    <div class="mb-3">
                        <label for="tempat">Anggaran</label>
                        <input type="number" inputmode="numeric" class="form-control" id="tempat" name="anggaran">
                    </div>
                    <div class="mb-3">
                        <label for="pengaju">PIC</label>
                        <input class="form-control" type="text" name="pelaksana" id="pengaju">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">simpan</button>
                        <button type="reset" class="btn btn-secondary">reset</button>
                    </div>
                </form>
            </x-modal>
            @foreach ($program as $item)
                <x-modal modalId="deleteProgramm" modalTitle="Hapus Program">
                    <form action="{{ route('program.delete', $item->nama_program) }}" method="post">@method('delete')@csrf
                         <div class="mb-3">
                            <h4 class="card-text">Yakin ingin menghapus data?</h4>
                        </div>
                        {{--<div class="mb-3">
                            <textarea class="form-control" id="pengaju" name="deskripsi" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="start">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start" name="tanggal_mulai">
                        </div>
                        <div class="mb-3">
                            <label for="end">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end" name="tanggal_selesai">
                        </div>
                        <div class="mb-3">
                            <label for="tempat">Tempat Pelaksanaan</label>
                            <input type="text" class="form-control" id="tempat" name="tempat">
                        </div>
                        <div class="mb-3">
                            <label for="tempat">Anggaran</label>
                            <input type="number" inputmode="numeric" class="form-control" id="tempat"
                                name="anggaran">
                        </div>
                        <div class="mb-3">
                            <label for="pengaju">PIC</label>
                            <input class="form-control" type="text" name="pelaksana" id="pengaju">
                        </div> --}}
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">simpan</button>
                            <button type="reset" class="btn btn-secondary">reset</button>
                        </div>
                    </form>
                </x-modal>
            @endforeach

        </div>
    </div>
@endsection
