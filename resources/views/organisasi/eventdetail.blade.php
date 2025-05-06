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
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-text text-center">
                    <h3 class="card-title">Demografi Pengunjung Acara</h3>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>

            </div>
        </div>
        <div class="col-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <ul class="nav nav-underline justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"data-bs-toggle="tab"
                            data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#form-response-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false">Form &
                            Response</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#attendance-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Attendance</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab"
                        tabindex="0">
                        {{ $event->deskripsi }}
                    </div>
                    <div class="tab-pane fade" id="form-response-tab-pane" role="tabpanel"
                        aria-labelledby="form-response-tab" tabindex="0">
                        <x-table :tableHeaders="['no', 'nama form', 'action']">
                            <tr>
                                <td>1</td>
                                <td>Form Pendaftaran</td>
                                <td>
                                    @if (!$registform)
                                        <form action="{{ route('form.save') }}" method="POST">
                                            @csrf
                                            <input type="text" class="d-none" name="namaform" value="Registration Form">
                                            <input type="text" class="d-none" name="eventid" value="{{ $event->id }}">
                                            <button class="btn btn-primary">tambah</button>
                                        </form>
                                    @else
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item"
                                                    href="{{ route('form.question', $registform->slug) }}">
                                                    <i class="icon-base bx bx-edit-alt me-1"></i>
                                                    Buat Form</a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-regular fa-eye"></i>
                                                    Lihat Response</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('edit.question', $registform->slug) }}">
                                                    <i class="icon-base bx bx-edit-alt me-1"></i>
                                                    Edit Form</a>

                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#delete"><i class="icon-base bx bx-trash me-1"></i>
                                                    hapus</a>
                                            </div>
                                        </div>
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Form Feedback</td>
                                <td>
                                    @if (!$feedbackform)
                                        <form action="{{ route('form.save') }}" method="POST">
                                            @csrf
                                            <input type="text" class="d-none" name="namaform" value="Feedback Form">
                                            <input type="text" class="d-none" name="eventid" value="{{ $event->id }}">
                                            <button class="btn btn-primary">tambah</button>
                                        </form>
                                    @else
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item"
                                                    href="{{ route('form.question', $feedbackform->slug) }}">
                                                    <i class="icon-base bx bx-edit-alt me-1"></i>
                                                    Buat Form</a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-regular fa-eye"></i>
                                                    Lihat Response</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('edit.question', $feedbackform->slug) }}">
                                                    <i class="icon-base bx bx-edit-alt me-1"></i>
                                                    Edit Form</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#delete"><i class="icon-base bx bx-trash me-1"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        </x-table>
                    </div>
                    <div class="tab-pane fade" id="attendance-tab-pane" role="tabpanel" aria-labelledby="attendance-tab"
                        tabindex="0">
                        <x-table :tableHeaders="['no', 'nama', 'status']">
                            
                        </x-table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
