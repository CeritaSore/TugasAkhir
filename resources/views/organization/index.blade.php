<x-headerassets title="dashboard - organisasi"></x-headerassets>
<h2 class="text-center">selama datang kembali {{ Auth::user()->name }} </h2>
<h2>Daftar Pengurus Organisasi</h2>
<table>
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>jabatan</th>
            <th>email</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('organization.edit', $user->id) }}">edit</a>
                <form action="{{ route('organization.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
        @endforeach --}}
    </tbody>
</table>
<x-footerassets></x-footer>
