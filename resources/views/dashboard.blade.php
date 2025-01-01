@if (Auth::check() && Auth::user()->role === 'kemahasiswaan')
    <h2>Hai, {{ Auth::user()->name }} </h2>
    <a href="{{ route('create.token') }}">buat token</a>
    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
@else
    <a href="{{route('auth.login')}}">Login</a>
@endif
<h2>Welcome to the dashboard</h2>
