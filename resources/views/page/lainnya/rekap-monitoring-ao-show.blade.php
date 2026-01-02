@extends('layouts.main')
@section('konten')
    <style>
        th {
            vertical-align: middle !important;
            text-align: center;
        }

        .text ol {
            list-style-type: decimal !important;
            /* Pastikan angka tetap muncul */
            padding-left: 20px !important;
            /* Sesuaikan indentasi */
        }

        .text ul {
            list-style-type: disc !important;
            /* Pastikan bullet tetap muncul */
            padding-left: 20px !important;
        }
    </style>

    <main class="main users chart-page" id="skip-target" style="font-size: 12px;">

        <div class="container" style="margin-top: -10px">
            {{-- breadcrumb --}}
            @include('layouts.breadcrumb')

            <div class="stat-cards-item">
                <div class="card-body w-100">
                    <div class="row">
                        <div class="col-md-6 mb-2" style="font-size: 14px;">
                            <strong>Nama AO:</strong> {{ $nama_ao }}
                        </div>
                        <div class="col-md-6 mb-2" style="font-size: 14px; text-align: right;">
                            <strong>Cabang:</strong> {{ $cabang }}
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr style="background-color: #f2f2f2; text-align: center;">
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 15%;">Tanggal Kunjungan</th>
                                    <th style="width: 20%;">Nama Prospek</th>
                                    <th style="width: 60%;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($monitoring as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td style="text-align: center;">
                                            {{ $item->tgl_kunjungan->translatedFormat('d M Y') }}</td>
                                        <td>{{ $item->nama_cadeb }}</td>
                                        <td class="text">{!! $item->keterangan !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
    </main>

@section('script')
@endsection
@endsection
