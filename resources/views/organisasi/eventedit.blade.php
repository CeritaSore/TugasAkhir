@extends('layout2')
@section('card')
    <div class="col-8 ">
        <form action="{{ route('update.event', $event->slug) }}" method="POST">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">
                        Edit Acara
                    </h4>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="nama">Nama Acara</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukan nama"
                            value="{{ $event->nama }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi" class="form-control">{{ $event->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tipe">tipe acara</label>
                        <select id="tipe" class="form-control" name="type_id">
                            <option value="#" selected>pilih</option>
                            @foreach ($eventTypes as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $event->type_id ? 'selected' : '' }}>
                                    {{ $item->tipe }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="timeline">tanggal mulai</label>
                        <input type="date" name="tanggal_mulai" id="timeline" class="form-control"
                            value="{{ $event->tanggal_mulai }}">
                    </div>
                    <div class="mb-3">
                        <label for="timeline">tanggal selesai</label>
                        <input type="date" name="tanggal_selesai" id="timeline"
                            class="form-control"value="{{ $event->tanggal_selesai }}">
                    </div>
                    <div class="mb-3">
                        <label for="tipe">program kerja</label>
                        <select id="tipe" name="proker" class="form-control">
                            <option value="#" selected>pilih</option>
                            @foreach ($proker as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $event->proker_id ? 'selected' : '' }}>
                                    {{ $item->nama_program }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">simpan</button>
                        <a href="{{ route('organisasi.acara') }}" class="btn btn-secondary">kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
