<div class="card">
    <div class="d-flex w-full   justify-content-center align-items-center">
        <h5 class="card-header">{{ $tableTitle }}
        </h5>
        <button class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#{{$modalId}}">New</button>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    @foreach ($tableHeaders as $item)
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
