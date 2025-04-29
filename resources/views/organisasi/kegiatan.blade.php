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
@php

    $eventType = ['open tender', 'open recruitment', 'webinar & workshop'];
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <x-table :tableHeaders="['no', 'Nama kegiatan', 'action']" tableTitle="Daftar Acara & Kegiatan" modalId="tambah">
                @foreach ($event as $item)
                    <tr>
                        <td>1</td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{ route('show.event', $item->slug) }}"><i
                                            class="icon-base bx bx-edit-alt me-1"></i>
                                        Edit Acara</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#detail{{ $item->id }}">
                                        <i class="icon-base bx bx-edit-alt me-1"></i>
                                        Detail Acara</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $item->id }}"><i
                                            class="icon-base bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                @endforeach
                </tr>
            </x-table>
            <x-modal modalId="tambah" modalTitle="Tambah acara">
                <form action="{{ route('store.event') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama">Nama Acara</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukan nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tipe">tipe acara</label>
                        <select id="tipe" class="form-control" name="type_id">
                            <option value="#" selected>pilih</option>
                            @foreach ($eventTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->tipe }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="timeline">tanggal mulai</label>
                        <input type="date" name="tanggal_mulai" id="timeline" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="timeline">tanggal selesai</label>
                        <input type="date" name="tanggal_selesai" id="timeline" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tipe">program kerja</label>
                        <select id="tipe" name="proker" class="form-control">
                            <option value="#" selected>pilih</option>
                            @foreach ($proker as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_program }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">simpan</button>
                        <button class="btn btn-danger" type="reset">reset</button>
                    </div>

                </form>
            </x-modal>
            @foreach ($event as $item)
                <x-modal modalId="detail{{ $item->id }}" modalTitle="Detail">
                    <div class="card-title">
                        <h4>nama acara : {{ $item->nama }}</h4>
                        <h4>tipe : {{ $item->event_type->tipe }}</h4>
                        <h4>deskripsi : {{ $item->deskripsi }}</h4>
                        <h4>timeline : {{ \carbon\carbon::parse($item->tanggal_mulai)->format('d M Y') }} s/d
                            {{ \carbon\carbon::parse($item->tanggal_selesai)->format('d M Y') }}</h4>
                        <h4>program kerja : {{ $item->prokers->nama_program }}</h4>
                    </div>
                </x-modal>
            @endforeach
            @foreach ($event as $item)
                <x-modal modalId="delete{{ $item->id }}" modalTitle="Detail">
                    <div class="card-title">
                    <form action="{{ route('delete.event', $item->slug) }}" method="POST">
                            @csrf
                            @method('delete')
                            <h2>Yakin ingin menghapus acara {{ $item->nama }}</h2>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">simpan</button>
                                <button class="btn btn-danger" type="reset">reset</button>
                            </div>
                        </form>
                    </div>
                </x-modal>
            @endforeach

        </div>
    </div>
@endsection
