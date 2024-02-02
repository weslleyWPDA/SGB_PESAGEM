<div class="nav-item dropend d-inline float-none">
    <a class="drop btn dropdown-toggle d-block  justify-content-xl-center align-items-xl-center" aria-expanded="false"
        data-bs-toggle="dropdown" style="font-weight: 900;color: rgb(255,255,255);border-style: none">
        {{ $label }}
    </a>
    <div class="dropdown-menu text-center">
        {{ $slot }}
    </div>
    {{-- css em layouts.css --}}

    <style>
        .select2 .select2-container {
            max-width: 100px !important
        }
    </style>
</div>
