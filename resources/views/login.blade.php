<h2>login</h2>
<<<<<<< HEAD
@if (session('error'))
    {{ session('error') }}
@endif
=======
>>>>>>> 47b3a8f (update repo & creating login)
<form action="{{ route('auth.login') }}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="email" id="email" name="email">
    <label for="password">password</label>
<<<<<<< HEAD
    <input type="password" minlength="5" required id="password" name="password">
=======
    <input type="password" id="password" name="password">
>>>>>>> 47b3a8f (update repo & creating login)
    <button type="submit">login</button>
</form>
