<div class="card">
    <div class="d-flex justify-content-between">
        <h5 class="card-header">{{ $tableTitle }} </h5>
        <button class="btn btn-primary my-auto me-5">new</button>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
                <tr>
                    @foreach ($menu as $item)
                        <th>{{ $item }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">


                {{ $slot }}


            </tbody>
        </table>
    </div>
</div>
