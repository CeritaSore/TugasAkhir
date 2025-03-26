<x-headerassets></x-headerassets>
<x-sidebar :menu="[
    ['name' => 'Dashboard', 'routename' => 'home', 'active' => ''],
    ['name' => 'Token', 'routename' => 'token', 'active' => 'active'],
    ['name' => 'Organisasi', 'routename' => 'organisasi', 'active' => ''],
]"></x-sidebar>

<x-navbar></x-navbar>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-6 mb-6">
                        <x-table tableTitle="Daftar Token" :menu="['no', 'token', 'untuk', 'dibuat oleh', 'kadaluarsa', 'status', 'action']">
                            @foreach ($getToken as $item)
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->token }}</td>
                                <td>{{ $item->receiverBy->name }}</td>
                                <td>{{ $item->creatorFor->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->expired)->format('D, M Y') }}</td>
                                <td><span
                                        class="badge  {{ $item->status == 0 ? 'bg-label-warning' : 'bg-label-success' }} me-1">Pending</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="icon-base bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                        </x-table>

                    </div>

                </div>
            </div>
        </div>
        <x-footer></x-footer>
        <x-footerassets></x-footerassets>
