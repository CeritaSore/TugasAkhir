<x-headerassets title="Dashboard"></x-headerassets>
<div class="container">
    <h2>selamat datang, {{ $user->name }}</h2>
    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button class="btn btn-dark">Logout</button>
    </form>
</div>
<div class="container">
    <h2 class="display-4">Registrasi Akses Token</h2>
    <a href="{{ route('create.token') }}" class="btn btn-success">Daftarkan Token</a>
    <div id="registeredToken" class="registeredToken">
        <table class="table table-bordered">

            <tr>
                <th>no</th>
                <th>token</th>
                <th>organisasi</th>
                <th>role</th>
                <th>diperuntukan</th>
                <th>dibuat oleh</th>
                <th>kadaluarsa</th>
                <th>status</th>
                <th>action</th>
            </tr>
            @foreach ($token as $item)
                <tr>
                    <td>no</td>
                    <td>{{ $item->token }}</td>
                    <td>{{ $item->organization->nama }}</td>
                    <td>{{ $item->roles->role }}</td>
                    <td>{{ $item->receiver->name }}</td>
                    <td>{{ $item->creator->name }}</td>
                    <td>{{ $item->expired_at }}</td>
                    <td>{{ $item->status == 0 ? 'belum digunakan' : 'sudah digunakan' }}</td>
                    <td>
                        <a href="#" class="btn btn-primary">edit</a>
                        <a href="#" class="btn btn-danger">delete</a>
                    </td>
            @endforeach
            </tr>
        </table>
    </div>
</div>
<div class="container">
    <h2 class="display-4">Organisasi Terdaftar</h2>
    <a href="#" class="btn btn-success">Daftarkan Organisasi</a>
    <div id="organization" class="organization">
        <table class="table table-bordered">
            <tr>
                <th>no</th>
                <th>nama organisasi</th>
                <th>deskripsi</th>
                <th>tanggal berdiri</th>
                <th>status</th>
                <th>total anggota</th>
                <th>action</th>
            </tr>
            @foreach ($org as $item)
                <tr>
                    <td>no</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ carbon\carbon::parse($item->tanggal_berdiri)->format('D-m-Y') }}</td>
                    <td>{{ $item->status == 0 ? 'belum diverifikasi' : 'sudah diverifikasi' }}</td>
                    <td>{{ $item->total_anggota }}</td>
                    <td>
                        <a href="#" class="btn btn-primary">edit</a>
                        <a href="#" class="btn btn-danger">delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<x-footerassets></x-footerassets>
