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
        <div class="col-lg-12 mb-5">
            <div class="card h-100">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="card-text">
                                <p class="mb-1">Anggaran</p>
                                <h4 class="card-title mb-3">Rp {{ number_format($budgets, 2, ',', '.') }}</h4>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <x-navtab>
            @section('rab')
                <x-table :tableHeaders="['no', 'nama RAB', 'action']">
                    <tr>
                        <td></td>
                    </tr>
                </x-table>
            @endsection
        </x-navtab>
    </div>
</div>
@endsection
