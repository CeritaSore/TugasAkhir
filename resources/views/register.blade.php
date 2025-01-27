<h2>registration</h2>
@if (session('error'))
    {{ session('error') }}
@endif
<form action="{{ route('auth.register') }}" method="post">
    @csrf
    <label for="name">nama</label>
    <input type="text" id="name" name="nama">
    <label for="nim">nim</label>
    <input type="text" id="nim" name="nim" inputmode="numeric">
    <label for="email">email</label>
    <input type="email" id="email" name="email">
    <label for="password">password</label>
    <input type="password" minlength="5" required id="password" name="password">
    <button type="submit">register</button>
</form>
<p>sudah punya akun ? <a href="{{route('view.login')}}">login</a></p>