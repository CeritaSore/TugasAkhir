<x-headerassets></x-headerassets>
<x-sidebar :menu="[
    ['name' => 'Dashboard', 'routename' => 'home', 'active' => ''],
    ['name' => 'Token', 'routename' => 'token', 'active' => ''],
    ['name' => 'Organisasi', 'routename' => 'organisasi', 'active' => 'active'],
]"></x-sidebar>
<x-navbar></x-navbar>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-6 mb-6">
                        <x-table tableTitle="Daftar Organisasi Aktif" :menu="['No', 'Nama Organisasi', 'Deskripsi', 'Tanggal Berdiri', 'Status', 'Action']">
                            @foreach ($organisasi as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_berdiri)->format('D, M Y') }}</td>
                                    <td><span
                                            class="badge {{ $item->status === 'aktif' ? 'bg-label-success' : 'bg-label-warning' }}">{{ $item->status === 'aktif' ? 'Aktif' : 'Non Akti' }}</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="icon-base bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                            @endforeach
                            </tr>
                        </x-table>

                    </div>
                    {{-- <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <x-card cardtitle="Jumlah Mahasiswa" cardbody="100"></x-card>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <x-card cardtitle="Jumlah Mahasiswa" cardbody="100"></x-card>
                    </div> --}}
                </div>
            </div>
        </div>
        <x-footer></x-footer>
        <x-footerassets></x-footerassets>
