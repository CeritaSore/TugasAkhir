<x-headerassets title="dashboard - organisasi"></x-headerassets>
<h2 class="text-center">selama datang kembali {{ Auth::user()->name }} </h2>
<div class="container">
    <div class="row">
        @foreach ($menu as $item)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $item }}

                        </h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

<x-footerassets></x-footer>
