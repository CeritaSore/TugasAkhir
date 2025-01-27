<h2>login</h2>
@if (session('error'))
    {{ session('error') }}
@endif
<form action="{{ route('auth.login') }}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="email" id="email" name="email">
    <label for="password">password</label>
    <input type="password" minlength="5" required id="password" name="password">
    <button type="submit">login</button>
</form>
<p>belum punya akun? <a href="{{route('view.register')}}">regisrasi</a></p>
