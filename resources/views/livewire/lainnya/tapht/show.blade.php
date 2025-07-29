@extends('layouts.main')
@section('konten')
    @push('styles')
        @livewireStyles
    @endpush

    @push('scripts')
        @livewireScripts
        {{-- disini dikasih Js juga bisa :) --}}
    @endpush

    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">

                <div class="card-body w-100">
                    <div class="row mb-3">
                        <div class="col-12 col-md-3 text-end">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary text-white btn-sm w-100 w-md-auto">
                                <i class="fa-solid fa-arrow-left"></i> Back to menu
                            </a>
                        </div>
                    </div>




                    {{-- Tables --}}
                    <div class="container">
                        <div class="card card-outline card-primary">
                            <div class="card-header" style="font-size: 14px">
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>KC:</strong> {{ $cabang }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Kode:</strong> {{ $kode }}
                                    </div>
                                    <div class="col-md-6">
                                        <strong>SHM/SHGB/SHGU:</strong> {{ $sertifikat . ' Nomor: ' . $nomor }}
                                    </div>
                                </div>
                                <br>
                                {{-- @if ($jabatan == 'Kasi Operasional' || $jabatan == 'Kasi Komersial' || $jabatan == 'Pimpinan Cabang')
                                    <a class="btn btn-primary btn-icon-split btn-sm" href="/tapht/create" target="_blank">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text" style="font-size: 13px">Tambah {{ $title }}</span>
                                    </a>
                                @endif --}}
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-striped table-sm" style="font-size: 13px;">
                                    <thead style="background-color: lightseagreen">
                                        <tr>
                                            <th>#</th> {{-- 0 --}}
                                            <th>Jenis Perikatan</th> {{-- 4 --}}
                                            <th>Proggress</th> {{-- 5 --}}
                                            <th>Tgl Awal Aktif</th> {{-- 6 --}}
                                            <th>Tgl Akhir Aktif</th> {{-- 7 --}}
                                            <th>Status</th> {{-- 8 --}}
                                            <th>Keterangan</th> {{-- 9 --}}
                                            <th>Created At</th> {{-- 9 --}}
                                            {{-- <th style="width: 5%">Aksi</th> 10 --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->jns_perikatan }}</td>
                                                <td>{{ $item->progress }}</td>
                                                <td>
                                                    {!! $item->tgl_awal ? $item->tgl_awal->translatedFormat('d F Y') : '<i>not set</i>' !!}
                                                </td>
                                                <td>
                                                    {!! $item->tgl_akhir ? $item->tgl_akhir->translatedFormat('d F Y') : '<i>not set</i>' !!}
                                                </td>
                                                <td>
                                                    @if ($item->status == 'Selesai')
                                                        <span class="badge bg-success">Selesai</span>
                                                    @elseif ($item->status == 'Proses')
                                                        <span class="badge bg-warning">Proses</span>
                                                    @else
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>{{ $item->created_at->translatedFormat('d F Y, H:i') }}</td>
                                                {{-- <td>
                                                    @if ($jabatan == 'Kasi Operasional' || $jabatan == 'Kasi Komersial' || $jabatan == 'Pimpinan Cabang')
                                                        @if ($item->created_at->startOfDay()->diffInDays(now()) < 2)
                                                            <a class="btn btn-warning btn-sm"
                                                                href="/tapht/' {{ base64_encode($item->id_tapht) }} '/edited"
                                                                target="_blank">
                                                                <i class="fa fa-edit"></i></a>
                                                        @else
                                                            <a class="edit btn btn-warning btn-sm disabled"><i
                                                                    class="fa fa-edit"></i></a>
                                                        @endif
                                                    @else
                                                        <a class="edit btn btn-warning btn-sm disabled"><i
                                                                class="fa fa-edit"></i></a>
                                                    @endif
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card card-outline card-danger mb-0"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection
