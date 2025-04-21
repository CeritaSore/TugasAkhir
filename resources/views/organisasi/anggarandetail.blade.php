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
        <div class="col-lg-12 mt-5">

            <x-table tableTitle="Daftar Rancangan" :tableHeaders="['NO', 'nama items', 'jumlah', 'harga satuan', 'satuan barang', 'total', 'action']" modalId="tambahdata">
                @foreach ($items as $item)
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->nama_items }}
                        </td>
                        <td>
                            {{ $item->jumlah }}
                        </td>
                        <td>
                            Rp {{ number_format($item->harga_satuan, 0, '.', '.') }}
                        </td>
                        <td>

                            {{ $item->satuan_barang }}
                        </td>
                        <td>

                            Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="#"><i class="icon-base bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#deletedata"><i class="icon-base bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                @endforeach
                </tr>
                <tr>
                    <td colspan="5">Total pengajuan = </td>
                    <td>Rp {{ number_format($sumBudgets, 0, ',', '.') }}</td>
                </tr>
            </x-table>

        </div>
        <x-modal modalTitle="Tambah data" modalId="tambahdata">
            <form action="{{ route('save.anggaran.detail', $budgets) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama">Nama Item</label>
                    <input type="text" class="form-control" id="nama" name="nama_items">
                </div>
                <div class="mb-3">
                    <label for="pengaju">Jumlah</label>
                    <input type="number" class="form-control" id="pengaju" name="jumlah">
                </div>
                <div class="mb-3">
                    <label for="divisi">Harga Satuan</label>
                    <input type="number" class="form-control" id="divisi" name="harga_satuan">
                </div>
                <div class="mb-3">
                    <label for="divisi">Satuan Barang</label>
                    <input type="text" class="form-control" id="divisi" name="satuan_barang">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">simpan</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">batal</button>
                </div>
            </form>
        </x-modal>
        {{--  @foreach ($budgets as $item)
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
    @endforeach --}}
    @endsection
