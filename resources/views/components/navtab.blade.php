<div class="nav-align-top nav-tabs-shadow">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                Rancangan Anggaran
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false"
                tabindex="-1">
                Laporan Anggaran Kegiatan
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false"
                tabindex="-1">
                Laporan Pertanggung Jawaban
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="navs-top-home" role="tabpanel">
            @yield('rab')
        </div>
        <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
            @yield('lak')
        </div>
        <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
            @yield('lpj')
        </div>
    </div>
</div>
