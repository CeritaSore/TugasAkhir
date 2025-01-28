<x-headerassets title="Login"></x-headerassets>
@if (session('error'))
    {{ session('error') }}
@endif
<p>belum punya akun? <a href="{{ route('view.register') }}">regisrasi</a></p>
<div class="container bg-primary text-light">
    <form action="{{ route('auth.login') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<x-footerassets></x-footerassets>
