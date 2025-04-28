@extends('layout2')
@section('card')
    @php
        $status = ['direncanakan', 'dilaksanakan', 'selesai'];
    @endphp
    <div class="col-xxl-8">
        <form action="{{ route('update.status', $showPrograms->nama_program) }}" method="POST">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">
                        Update Status
                    </h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 form-group">
                        <label for="nama">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option value="#" selected>--status--</option>
                            @foreach ($status as $item)
                                <option value="{{ $item }}" {{ $item === $showPrograms->status ? 'selected' : '' }}>
                                    {{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">simpan</button>
                        {{-- <button type="button" class="btn btn-secondary" id="batal">batal</button> --}}
                        <a href="{{ route('organisasi.program') }}" class="btn btn-secondary" id="batal">batal</a>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection
