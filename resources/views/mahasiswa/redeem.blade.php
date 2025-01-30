<x-headerassets title="Token Page"></x-headerassets>
<form action="{{ route('save.redeem') }}" method="post">
    @csrf
    <label for="token">token</label>
    <input type="text" name="redeemtoken" id="token">
    <button type="submit" class="btn btn-secondary">redeem</button>
</form>
<x-footerassets></x-footerassets>
