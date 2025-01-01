<h2>login</h2>
<form action="{{ route('auth.login') }}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="email" id="email" name="email">
    <label for="password">password</label>
    <input type="password" id="password" name="password">
    <button type="submit">login</button>
</form>
