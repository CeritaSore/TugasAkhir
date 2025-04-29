<div class="nav-align-top nav-tabs-shadow">
    <ul class="nav nav-tabs justify-content-center" role="tablist">
        @foreach ($navtabheader as $index => $item)
            <li class="nav-item" role="presentation">
                <button type="button" class="nav-link {{ $index == 0 ? 'active' : '' }}" role="tab"
                    data-bs-toggle="tab" data-bs-target="#navs-top-{{ Str::slug($item, '-') }}"
                    aria-controls="navs-top-{{ Str::slug($item, '-') }}"
                    aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                    {{ $item }}
                </button>
            </li>
        @endforeach
    </ul>

    <div class="tab-content">
        {{ $slot }}
    </div>
</div>
