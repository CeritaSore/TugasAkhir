<x-headerassets title="Registrasi Akses Token"></x-headerassets>
<div class="container">

    <form action="{{ route('save.token') }}" method="post">
        @csrf
        <label for="token">token</label>
        <input type="text" id="token" name="token">
        <br>
        <select name="nim" id="mahasiswa">
            <option value="">pilih mahasiswa</option>
            @foreach ($users as $item)
                <option value="{{ $item->nim }}"> {{ $item->name }} </option>
            @endforeach
        </select>
        <br>
        <label for="organisasi">organisasi</label>
        <select name="organisasi" id="organisasi">
            <option value="">pilih</option>
            @foreach ($org as $item)
                <option value="{{ $item->id }}"> {{ $item->nama }} </option>
            @endforeach
        </select>
        <br>
        <label for="organisasi">role</label>
        <select name="role" id="role">
            <option value="">pilih</option>
            @foreach ($role as $item)
                <option value="{{ $item->id }}"> {{ $item->role }} </option>
            @endforeach
        </select>
        <br>
        <label for="expired">expired</label>
        <input type="datetime-local" name="expired" id="expired">
        <br>
        <button type="submit" class="btn btn-secondary">save</button>
    </form>
</div>

<x-footerassets></x-footerassets>