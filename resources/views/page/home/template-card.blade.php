<div class="card mb-2">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $nomor }}</h5>
        <i class="d-none d-lg-inline" style="font-size: 13px;">
            Info detail ada di <b>Menu Lainnya -> Rekap Data SPK</b> atau
            <a href="{{ route('rekap.spk') }}" class="text-primary">Klik disini!</a>
        </i>
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
                            {{ number_format($stat['total']) }}
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
                            {{ number_format($stat['disetujui']) }}
                            &nbsp; | &nbsp;
                            {{ number_format($stat['tidak_diambil']) }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">DISETUJUI | TIDAK DIAMBIL</p>
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
                            {{ number_format($stat['cancel']) }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">DEBITUR CANCEL</p>
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
                            {{ number_format($stat['selesai']) }}
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
                            {{ number_format($stat['proses']) }}
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
                            {{ number_format($stat['ditolak']) }}
                            &nbsp; | &nbsp;
                            {{ number_format($stat['slik']) }}
                        </p>
                        <p class="stat-cards-info__title" style="font-size: 12px;">DITOLAK | DITOLAK SLIK</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
