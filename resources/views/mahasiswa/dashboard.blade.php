 <x-headerassets title="Dashboard"></x-headerassets>
 @if (Auth::check())
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1>Dashboard</h1>
                 <p>Selamat datang di dashboard mahasiswa {{ Auth::user()->name }}</p>
             </div>
         </div>

         @if ($notify->isNotEmpty())
             <h2>1 token tersedia untuk di redeem</h2>
             <a href="{{ route('show.redeem', Auth::user()->nim) }}" class="btn btn-primary mb-3">Redeem Sekarang</a>
         @endif

         @if ($hasAccess)
             <a href="{{ route('dashboard.organisasi', Auth::user()->nim) }}" class="btn btn-primary">Kelola Organisasi</a>
         @endif

         <form action="{{ route('auth.logout') }}" method="post">
             @csrf
             <button type="submit" class="btn btn-secondary">Logout</button>
         </form>
     </div>
 @endif
 <x-footerassets></x-footerassets>
