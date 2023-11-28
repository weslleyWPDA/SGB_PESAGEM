<div class="nav-item dropend d-inline float-none "style="width: 100%;text-align: center;">
    <a class="drop btn btn-secondary dropdown-toggle d-block d-xl-flex justify-content-xl-center align-items-xl-center"
        aria-expanded="false" data-bs-toggle="dropdown"
        style="padding:5px;font-size: 12px;font-weight: 900;color: rgb(255,255,255);border-style: none;text-decoration:none">
        {{ $label }}
    </a>
    <div class="dropdown-menu text-center">
        {{ $slot }}
    </div>
    {{-- css em layouts.css --}}
</div>
