<div class="col-lg-6 col-md-12 col-6 mb-6">
    <div class="card h-100">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                <div class="avatar flex-shrink-0">
                    <i class="icon-base bx bx-{{ $cardIcon }} text-success"></i>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                </div>
            </div>
            <p class="mb-1">{{ $cardTitle }}</p>
            <h4 class="card-title mb-3">{{ $cardSubtitle }}</h4>
            <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i> +72.80%</small>
        </div>
    </div>
</div>
