<x-headerassets title="Landing Page"></x-headerassets>
<div class="container text-center">
    <h2 class="display-4 text-center text-capitalize">selamat datang</h2>
    <p class="text-center">Ini adalah halaman landing page</p>
    @if (Auth::check())
        <a href="{{ route('dashboard.' . Auth::user()->role) }}" class="btn btn-primary">dashboard</a>
    @else
        <a href="{{ route('view.login') }}" class="btn btn-secondary">login</a><a href="{{ route('view.register') }}"
            class="btn btn-secondary">register</a>
    @endif
</div>
<x-footerassets></x-footerassets>
