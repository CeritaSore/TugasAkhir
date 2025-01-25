<h2>login</h2>
<<<<<<< HEAD
<<<<<<< HEAD
@if (session('error'))
    {{ session('error') }}
@endif
=======
>>>>>>> 47b3a8f (update repo & creating login)
=======
@if (session('error'))
    {{ session('error') }}
@endif
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
<form action="{{ route('auth.login') }}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="email" id="email" name="email">
    <label for="password">password</label>
<<<<<<< HEAD
<<<<<<< HEAD
    <input type="password" minlength="5" required id="password" name="password">
=======
    <input type="password" id="password" name="password">
>>>>>>> 47b3a8f (update repo & creating login)
=======
    <input type="password" minlength="5" required id="password" name="password">
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
    <button type="submit">login</button>
</form>
