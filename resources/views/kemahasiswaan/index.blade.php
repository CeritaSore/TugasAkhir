<h2>daftar organisasi</h2>
<a href="{{ route('kemahasiswaan.create') }}">Tambah</a>
@if (session('success'))
    <h2>{{ session('success') }}</h2>
@endif
<table>
    @foreach ($organisasi as $item)
        <tr>
            <th>nama organisasi</th>
            <th>deskripsi</th>
            <th>tanggal berdiri</th>
            <th>status organisasi</th>
            <th>action</th>
        </tr>
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_berdiri)->format('d-m-Y') }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="{{ route('kemahasiswaan.edit', $item->id) }}">Edit</a>
                
            </td>
    @endforeach
    </tr>
</table>
