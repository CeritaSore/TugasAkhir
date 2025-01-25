<form action="{{ route('kemahasiswaan.store') }}" method="post">
    @csrf
    <label for="nama">nama</label>
    <input type="text" name="nama" id="nama">
    <label for="tanggal">tanggal berdiri</label>
    <input type="date" name="tanggal" id="tanggal">
    <label for="deskripsi">deskripsi</label>
    <textarea name="deskripsi" id="deskripsi"></textarea>
    <button type="submit">submit</button>
</form>
