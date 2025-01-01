<form action="/savetoken" method="post">
    @csrf
    <label for="token">token</label>
    <input type="text" id="token">
    <label for="org">organisasi</label>
    <input type="text" id="organisasi">
    <button type="submit">save</button>
</form>
