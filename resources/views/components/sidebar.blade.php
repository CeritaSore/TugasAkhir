<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">Dashboard</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @foreach ($menu as $item)
            <li class="menu-item @if (Route::currentRouteName() === $item['routename']) active @endif">
                <a href="{{ route($item['routename']) }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Basic">{{ $item['name'] }}</div>
                </a>
            </li>
        @endforeach
    </ul>
</aside>
