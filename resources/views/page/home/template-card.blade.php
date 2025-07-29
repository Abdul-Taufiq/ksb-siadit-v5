<div class="card mb-2">
    <div class="card-header">
        <h5>{{ $nomor }}</h5>
    </div>
    <div class="card-body">
        <div class="row stat-cards">
            <div class="col-md-4 mb-2">
                <article class="stat-cards-item shadow">
                    <div class="stat-cards-icon primary">
                        <i data-feather="bar-chart-2" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num" style="font-size: 15px">
                            {{ number_format($spk->where('id_cabang', $id_cbg)->count(), 0, ',', '.') }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">TOTAL DATA</p>
                    </div>
                </article>
            </div>
            <div class="col-md-4 mb-2">
                <article class="stat-cards-item shadow">
                    <div class="stat-cards-icon primary">
                        <i class="fa-solid fa-file-circle-check text-success"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num" style="font-size: 15px">
                            {{ number_format($spk->where('id_cabang', $id_cbg)->where('status_akhir', 'DISETUJUI')->count(), 0, ',', '.') }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">DISETUJUI</p>
                    </div>
                </article>
            </div>
            <div class="col-md-4 mb-2">
                <article class="stat-cards-item shadow">
                    <div class="stat-cards-icon primary">
                        <i class="fa-solid fa-user-xmark text-info"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num" style="font-size: 15px">
                            {{ number_format($spk->where('id_cabang', $id_cbg)->where('status_akhir', 'DISETUJUI (TIDAK DIAMBIL)')->count(), 0, ',', '.') }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">DISETUJUI (TIDAK DIAMBIL)</p>
                    </div>
                </article>
            </div>
            <div class="col-md-4 mb-2">
                <article class="stat-cards-item shadow">
                    <div class="stat-cards-icon primary">
                        <i class="fa-solid fa-clipboard-check text-info"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num" style="font-size: 15px">
                            {{ number_format($spk->where('id_cabang', $id_cbg)->where('status_kredit', 'SELESAI')->count(), 0, ',', '.') }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">SELESAI</p>
                    </div>
                </article>
            </div>
            <div class="col-md-4 mb-2">
                <article class="stat-cards-item shadow">
                    <div class="stat-cards-icon primary">
                        <i class="fa-solid fa-hourglass-half text-warning"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num" style="font-size: 15px">
                            {{ number_format($spk->where('id_cabang', $id_cbg)->where('status_akhir', 'PROSES')->count(), 0, ',', '.') }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">PROSES</p>
                    </div>
                </article>
            </div>
            <div class="col-md-4 mb-2">
                <article class="stat-cards-item shadow">
                    <div class="stat-cards-icon primary">
                        <i class="fa-solid fa-file-circle-xmark text-danger"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num" style="font-size: 15px">
                            {{ number_format($spk->where('id_cabang', $id_cbg)->where('status_akhir', 'DITOLAK')->count(), 0, ',', '.') }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">DITOLAK</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
