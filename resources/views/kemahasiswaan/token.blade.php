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
    <x-table :tableHeaders="['No', 'Token', 'Untuk', 'status', 'Tanggal Kadaluarsa', 'Action']" tableTitle="Daftar Token">
        @foreach ($getToken as $key => $item)
            <tr>
                <td> {{ $key }} </td>
                <td> {{ $item->token }} </td>
                <td> {{ $item->receiveBy->name }} </td>
                <td class="badge {{ $item->status == 0 ? ' bg-label-danger' : ' bg-label-success' }}">
                    {{ $item->status == 0 ? 'Belum Digunakan' : 'Sudah Digunakan' }}</td>
                <td> {{ \Carbon\Carbon::parse($item->expired)->format('d M Y') }} </td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="icon-base bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0);"><i
                                    class="icon-base bx bx-edit-alt me-1"></i>
                                Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1"></i>
                                Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <x-modal>
        <form action="{{ route('save.token') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="token">Token</label>
                <input type="text" class="form-control" id="token" name="token" required>
            </div>

            <div class="mb-3">
                <label for="receiver">Penerima</label>
                <select class="form-control" id="receiver" name="receiver" required>
                    <option value="#" selected>--pilih--</option>
                    @foreach ($getmhs as $item)
                        <option class="text-dark" value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                {{-- <label for="creator">Creator</label> --}}
                <input type="hidden" class="form-control" id="creator" name="creator" value="1" required>
            </div>

            <div class="mb-3">
                <label for="organisasi_id">Organisasi</label>
                <select class="form-control" id="organisasi_id" name="organisasi_id" required>
                    <option value="#" selected>--pilih--</option>
                    @foreach ($showorg as $item)
                        <option class="text-dark" value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="role_id">Role</label>
                <select type="text" class="form-control" id="role_id" name="role_id" required>
                    <option value="#" selected>--pilih--</option>
                    @foreach ($showRole as $item)
                        <option class="text-dark" value="{{ $item->id }}">{{ $item->role }}</option>
                    @endforeach
                </select>
            </div>
            {{-- 
            <div class="mb-3">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div> --}}

            <div class="mb-3">
                <label for="expired">Kadaluarsa</label>
                <input type="date" class="form-control" id="expired" name="expired" required>
            </div>
            <div class="d-flex justify-content-around">
                <button class="btn btn-primary">simpan</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
            </div>
        </form>
    </x-modal>
@endsection
