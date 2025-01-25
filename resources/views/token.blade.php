<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
<form action="{{ route('save.token') }}" method="post">
    @csrf
    <label for="token">token</label>
    <input type="text" id="token" name="token">
<<<<<<< HEAD
    <select name="nim" id="mahasiswa">
        <option value="">pilih mahasiswa</option>
        @foreach ($users as $item)
            <option value="{{ $item->nim }}"> {{ $item->name }} </option>
        @endforeach
    </select>
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
    <label for="organisasi">organisasi</label>
    <select name="organisasi" id="organisasi">
        <option value="">pilih</option>
        @foreach ($org as $item)
            <option value="{{ $item->id }}"> {{ $item->nama }} </option>
        @endforeach
    </select>
    <label for="organisasi">role</label>
    <select name="role" id="role">
        <option value="">pilih</option>
        @foreach ($role as $item)
            <option value="{{ $item->id }}"> {{ $item->role }} </option>
        @endforeach
    </select>
<<<<<<< HEAD
    
    <label for="expired">expired</label>
    <input type="datetime-local" name="expired" id="expired">
=======
<form action="/savetoken" method="post">
    @csrf
    <label for="token">token</label>
    <input type="text" id="token">
    <label for="org">organisasi</label>
    <input type="text" id="organisasi">
>>>>>>> 47b3a8f (update repo & creating login)
=======
    <label for="expired">expired</label>
    <input type="datetime-local" name="expired" id="expired">
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
    <button type="submit">save</button>
</form>
