@if (Auth::check())
    <h2>Hai, {{ Auth::user()->name }}</h2>

    @if (Auth::user()->role === 'kemahasiswaan')
        <a href="{{ route('create.token') }}">Buat Token</a>
        <a href="{{ route('show.organisasi') }}">Buat organisasi</a>
    @elseif($showRedeemButton)
    <h2>you have 1 token for reedem to get access to another feature</h2>
        <a href="{{route('show.redeem')}}">Reedem Token</a>
    @endif
    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <a href="{{ route('view.login') }}">Login</a>
@endif

<h2>Welcome to the dashboard</h2>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
@if (Auth::check() && Auth::user()->role === 'kemahasiswaan')
    <table>
        <thead>
            <tr>
                <th>token</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alltoken as $item)
                <tr>
                    <td>{{ $item->token }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>daftar organisasi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($alltoken as $item)
                <tr>
                    <td>{{ $item->token }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
@endif
