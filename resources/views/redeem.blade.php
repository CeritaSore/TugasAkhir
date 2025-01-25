<form action="{{ route('save.redeem') }}" method="post">
    @csrf
    <label for="token">token</label>
    <input type="text" name="redeemtoken" id="token">
    <button type="submit">redeem</button>
</form>
