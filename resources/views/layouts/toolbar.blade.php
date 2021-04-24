<nav class="d-flex toolbar justify-content-between" id="toolbar">
    <ul class="nav d-none d-md-inline-flex">
        <li class="nav-item">
            <div class="nav-link">
                <a href="/" class="icon-20 icon-home align-bottom"></a>
            </div>
        </li>
        @yield('path')
    </ul>

    <ul class="nav justify-content-end">
        <li class="nav-link">
            <a href="/">
                +38 (098) 100-10-67
            </a>
        </li>
        <li class="nav-link small">
            <span class="text-white-50">
                ПН-ПТ: 10<sup class="text-white-50">00</sup>-19<sup class="text-white-50">00</sup>
            </span>
        </li>
        @if($menuTree)
            @include('layouts.header.menu')
        @endif
    </ul>
</nav>
