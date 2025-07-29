@php
    $url = request()->getPathInfo();
    $items = explode('/', $url);
    array_shift($items); // Hapus elemen pertama (kosong)

    // Ambil segmen pertama setelah slash
    $firstSegment = $items[0] ?? ''; // Jika kosong, tetap kosong
@endphp

<div class="stat-cards-item" style="height: 60px; margin-bottom: 10px;">
    <div class="card-body" style="margin-top: -25px;">
        <div class="row mt-3">
            <div class="col-sm-6">
                <h2 class="main-title float-sm-start" style="letter-spacing: 2px;">
                    {{ $title }}
                </h2>
            </div>
            <div class="col-sm-6 d-none d-sm-block">
                <ol class="breadcrumb float-sm-end m-1" style="padding-top: 2px;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="/{{ $firstSegment }}">{{ Str::ucfirst($firstSegment) }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ Str::ucfirst($title) }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
