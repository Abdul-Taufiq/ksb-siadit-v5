@extends('layouts.main')
@section('konten')
    @push('styles')
        @livewireStyles
    @endpush

    @push('scripts')
        @livewireScripts
    @endpush

    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            {{-- konten livewire --}}
            @yield('livewire-konten')
        </div>

    </main>
@endsection
