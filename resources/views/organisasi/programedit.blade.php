@extends('layout2')
@section('card')
    <div class="col-xxl-8">
        <form action="{{ route('update.program', $showPrograms->nama_program) }}" method="POST">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">
                        Edit Program Kerja
                    </h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 form-group">
                        <label for="nama">Program Kerja</label>
                        <input type="text" class="form-control" id="nama" value="{{ $showPrograms->nama_program }}"
                            name="nama_program">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="pengaju" name="deskripsi" placeholder="Deskripsi">{{ $showPrograms->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="start">Tanggal Mulai</label>
                        <input type="date" value="{{ $showPrograms->tanggal_mulai }}" class="form-control" id="start"
                            name="tanggal_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="end">Tanggal Selesai</label>
                        <input type="date" value="{{ $showPrograms->tanggal_selesai }}" class="form-control"
                            id="end" name="tanggal_selesai">
                    </div>
                    <div class="mb-3">
                        <label for="tempat">Tempat Pelaksanaan</label>
                        <input type="text" class="form-control" id="tempat" name="tempat"
                            value="{{ $showPrograms->tempat }}">
                    </div>
                    <div class="mb-3">
                        <label for="tempat">Anggaran</label>
                        <input type="number" inputmode="numeric" class="form-control" id="tempat" name="anggaran"
                            value="{{ $showPrograms->budgets->jumlah_anggaran }}">
                    </div>
                    <div class="mb-3">
                        <label for="pengaju">PIC</label>
                        <input class="form-control" type="text" name="pelaksana" id="pengaju"
                            value="{{ $showPrograms->pelaksana }}">
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
{{-- <script>
    const button = document.getElementById("batal");
    button.addEventListener('click', () => {
        window.location.replace(`${{ route('organisasi.program') }}`)
    })
</script> --}}
