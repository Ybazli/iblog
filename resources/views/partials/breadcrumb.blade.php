<div class="flex justify-between">
    <p class="breadcrumb-text">
        <a href="{{ route('home') }}"
           class="breadcrumb-link">
            Dashboard
        </a>
        /
        @yield('breadcrumb-pages')
    </p>
    <div>
        @yield('breadcrumb-btn-group')

    </div>
</div>