<form action="{{ route('kemahasiswaan.update', $organisasi->id) }}" method="post">
    @method('put')
    @csrf
    <label for="nama">nama</label>
    <input type="text" name="nama" id="nama" value="{{ $organisasi->nama }}">
    <label for="tanggal">tanggal berdiri</label>
    <input type="date" name="tanggal" id="tanggal"
        value="{{ $organisasi->tanggal_berdiri ? \Carbon\Carbon::parse($organisasi->tanggal_berdiri)->format('Y-m-d') : '' }}">
    <label for="status">status</label>
    <select name="status" id="status">
        @foreach ($status as $item)
            <option value="{{ $item }}" {{ $status === $organisasi->status ? 'selected' : '' }}>
                {{ $item }}</option>
        @endforeach
    </select>
    <label for="deskripsi">deskripsi</label>
    <textarea name="deskripsi" id="deskripsi">{{ $organisasi->deskripsi }}</textarea>
    <button type="submit">submit</button>

</form>
