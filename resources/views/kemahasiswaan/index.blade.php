<x-headerassets></x-headerassets>
<x-sidebar :menu="[
    ['name' => 'Dashboard', 'routename' => 'home', 'active' => 'active'],
    ['name' => 'Token', 'routename' => 'token', 'active' => ''],
    ['name' => 'Organisasi', 'routename' => 'organisasi', 'active' => ''],
]"></x-sidebar>
<x-navbar></x-navbar>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <x-card cardtitle="Jumlah Token" cardbody="{{ $allToken }}"
                            icon='/assets/img/icons/unicons/bx-code-alt.svg'></x-card>

                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <x-card cardtitle="Jumlah Organisasi" cardbody="{{ $allOrg }}"
                            icon="/assets/img/icons/unicons/folder-closed-regular.svg"></x-card>
                    </div>
                    {{-- <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <x-card cardtitle="Jumlah Mahasiswa" cardbody="100"></x-card>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                        <x-card cardtitle="Jumlah Mahasiswa" cardbody="100"></x-card>
                    </div> --}}
                </div>
            </div>
        </div>
        <x-footer></x-footer>
        <x-footerassets></x-footerassets>
