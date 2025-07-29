<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\Lainnya\LogActivityController;
use App\Http\Controllers\Lainnya\RekapController;
use App\Http\Controllers\MasterKredit\AgunanController;
use App\Http\Controllers\MasterKredit\DebiturController;
use App\Http\Controllers\MasterKredit\MukController;
use App\Http\Controllers\MasterKredit\PrintSPKController;
use App\Http\Controllers\MasterKredit\SpkController;
use App\Http\Controllers\MasterPKPMK\AddendumController;
use App\Http\Controllers\MasterPKPMK\PkPmkController;
use App\Http\Controllers\MasterUserController;
use App\Livewire\Lainnya\LogAppVersion;
use App\Livewire\Lainnya\TAphtLivewire;
use App\Livewire\MasterKredit\Muk\AddMukLivewire;
use App\Livewire\MasterKredit\Muk\IndexMukLivewire;
use App\Livewire\MasterPK\AddendumLivewire;
use App\Livewire\MasterPK\PerjanjianKredit;
use App\Livewire\Rekap\RekapLivewire;
use App\Models\User;
use App\Services\Lainnya\TAphtServices;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }
});

// Route::get('/error500', function () {
//     abort(229);
// });

// Route::get('hash/{id}', function () {
//     return bcrypt('id');
// });

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});

Route::get('/refereshcapcha', [HelperController::class, 'refereshCaptcha']);


// default route login laravel ui
Auth::routes([
    'register' => false, // Menonaktifkan halaman register
]);

Route::middleware(['auth'])->group(function () {
    // Route::get('/xxx', [App\Http\Controllers\HelperController::class, 'index'])->name('xxx');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    // Profile
    Route::resource('profile', ProfileController::class)->only([
        'index',
        'update'
    ]);
    Route::post('profile/upload/{user}', [ProfileController::class, 'upload'])->name('profile.upload');
    // User
    Route::resource('master-user', MasterUserController::class);
    Route::get('/master-user-deleted', [MasterUserController::class, 'deleted']);
    Route::get('export-excel/master-user', [MasterUserController::class, 'exportExcel']);
    Route::get('export-pdf/master-user', [MasterUserController::class, 'exportPdf']);

    Route::get('coba', function () {
        return view('page.lainnya.coba-trait', [
            'title' => 'Coba Trait',
        ]);
    });
    Route::get('tailwind', function () {
        return view('page.lainnya.coba-tailwind', [
            'title' => 'Coba Trait',
        ]);
    });



    // dddd
    // Master Kredit
    // debitur
    Route::group([
        'prefix' => 'debitur', // Awalan untuk semua rute di dalam grup
        // 'middleware' => ['auth'], // Middleware yang diterapkan pada semua rute di dalam grup
        // 'namespace' => 'App\Http\Controllers\Admin', // Namespace controller untuk rute di dalam grup
    ], function () {
        Route::get('/', [DebiturController::class, 'index'])->name('debitur.index');
        Route::get('/create', [DebiturController::class, 'create'])->name('debitur.create');
        Route::post('/store', [DebiturController::class, 'store'])->name('debitur.store');
        Route::get('/show/{id}', [DebiturController::class, 'show'])->name('debitur.show');
        Route::get('/edit/{id}/{metode}', [DebiturController::class, 'edit'])->name('debitur.edit');
        Route::patch('/update/{id}', [DebiturController::class, 'update'])->name('debitur.update');
        // live search debitur
        Route::get('/search', [DebiturController::class, 'search'])->name('search');
        Route::get('/search/agunan', [DebiturController::class, 'searchAgunan'])->name('search-agunan');
        Route::get('/search/kendaraan', [DebiturController::class, 'searchAgunanKenda'])->name('search-kenda');
        Route::get('/agunan-show-data/{idEncrypt}', [DebiturController::class, 'showModalAgunan']);
        Route::get('/debitur-show-data/{idEncrypt}', [DebiturController::class, 'showModal']);
        // SPK, Penjamin
        Route::get('/spk/create/{idDeb}', [SpkController::class, 'create'])->name('spk.create');
        Route::post('/spk/store', [SpkController::class, 'store'])->name('spk.store');
        Route::get('/spk/edit/{idDeb}/{metode}', [SpkController::class, 'edit'])->name('spk.edit');
        Route::patch('/spk/update/{id}', [SpkController::class, 'update'])->name('spk.update');
        // Agunan
        Route::get('/agunan/create/{idKredit}/{idDeb}', [AgunanController::class, 'create'])->name('agunan.create');
        Route::post('/spk/jaminan/store', [AgunanController::class, 'store'])->name('agunan.store');
        Route::get('/spk/jaminan/edit/{idold}/{idnew}/{metode}', [AgunanController::class, 'edit'])->name('agunan.edit');
        Route::patch('/spk/jaminan/update/{id}', [AgunanController::class, 'update'])->name('agunan.update');
        // print SPK
        Route::get('/print-spk/{debitur}', [PrintSPKController::class, 'printSPK'])->name('print.spk');
        Route::get('/print-idi/{debitur}', [PrintSPKController::class, 'printIDI'])->name('print.idi');

        // Debitur Exist
        Route::get('/create-exist/{id}/{metode}', [DebiturController::class, 'edit'])->name('debitur.exist');
        Route::get('/debitur-switch/{id}', [DebiturController::class, 'switch'])->name('debitur.switch');
    });


    // MUK
    Route::prefix('muk')->group(function () {
        Route::get('/', IndexMukLivewire::class)->name('muk.index');
        Route::get('/show/{id}', [MukController::class, 'show'])->name('muk.show');
        Route::get('/form-muk/add/{id}', [MukController::class, 'addMuk'])->name('muk.add');
        Route::post('/form-muk/store', [MukController::class, 'storeMuk'])->name('muk.store');
        Route::get('form-muk/add/part-dua/{idMuk}', [MukController::class, 'addMukPartDua'])->name('muk.add.partdua');
        Route::post('form-muk/store/part-dua', [MukController::class, 'storeMukPartDua'])->name('muk.store.partdua');
        Route::get('form-muk/add/part-tiga/{idMuk}', [MukController::class, 'addMukPartTiga'])->name('muk.add.parttiga');
        Route::post('form-muk/store/part-tiga', [MukController::class, 'storeMukPartTiga'])->name('muk.store.parttiga');
        Route::get('form-muk/add/part-empat/{idMuk}', [MukController::class, 'addMukPartEmpat'])->name('muk.add.partempat');
        Route::post('form-muk/store/part-empat', [MukController::class, 'storeMukPartEmpat'])->name('muk.store.partempat');
        Route::get('show-muk/scoring/{idMuk}', [MukController::class, 'showScoring'])->name('show.scoring');
        Route::get('form-muk/edit/{id}', [MukController::class, 'editMuk'])->name('muk.edit');

        // print
        Route::get('print-muk/{id}', [MukController::class, 'printMuk'])->name('print.muk');
        Route::get('print-muk-scoring/{agunan}/{idJaminan}/{idMuk}', [MukController::class, 'printScoring'])->name('print.scoring');
    });


    // PKPMK
    Route::prefix('pkpmk')->group(function () {
        Route::get('/', PerjanjianKredit::class)->name('pkpmk.index');
        Route::get('add/{idKredit}', [PkPmkController::class, 'create'])->name('pkpmk.create');
        Route::get('edit/{idKredit}', [PkPmkController::class, 'edit'])->name('pkpmk.edit');
        Route::post('store', [PkPmkController::class, 'store'])->name('pkpmk.store');
        Route::get('/show/{idPkmk}', [PkPmkController::class, 'show'])->name('pkpmk.show');
        Route::get('/show/detail/{idPkmk}', [PkPmkController::class, 'showDetail'])->name('pkpmk.showDetail');

        // print
        Route::get('/print-perjanjian-kredit-sppk/{idPkpmk}', [PkPmkController::class, 'printSppk'])->name('pkpmk.printSppk');
        Route::get('/print-perjanjian-kredit-pk/{idPkmk}', [PkPmkController::class, 'printPk'])->name('pkpmk.printPk');
        Route::get('/print-spa-kredit/{idPkmk}', [PkPmkController::class, 'printSpa'])->name('pkpmk.printSpa');
        Route::get('/print-sppjf-kredit/{idPkmk}', [PkPmkController::class, 'printSppjf'])->name('pkpmk.printSppjf');
        Route::get('/print-tpbj-kredit/{idPkmk}', [PkPmkController::class, 'printTpbj'])->name('pkpmk.printTpbj');
        Route::get('/print-sptma-kredit/{idPkmk}', [PkPmkController::class, 'printSptma'])->name('pkpmk.printSptma');
    });


    // Addendum
    Route::prefix('addendum')->group(function () {
        Route::get('/', AddendumLivewire::class)->name('addendum.index');
        Route::get('add/{idKredit}', [AddendumController::class, 'create'])->name('addendum.create');
        Route::get('edit/{idKredit}', [AddendumController::class, 'edit'])->name('addendum.edit');
        Route::post('store', [AddendumController::class, 'store'])->name('addendum.store');
        Route::get('/show/{idPkmk}', [AddendumController::class, 'show'])->name('addendum.show');
        Route::get('/show/detail/{idPkmk}', [AddendumController::class, 'showDetail'])->name('addendum.showDetail');

        // print
        Route::get('/print-perjanjian-kredit-sppk/{idPkpmk}', [AddendumController::class, 'printSppk'])->name('addendum.printSppk');
        Route::get('/print-perjanjian-kredit-pk/{idPkmk}', [AddendumController::class, 'printPk'])->name('addendum.printPk');
        Route::get('/print-spa-kredit/{idPkmk}', [AddendumController::class, 'printSpa'])->name('addendum.printSpa');
        Route::get('/print-sppjf-kredit/{idPkmk}', [AddendumController::class, 'printSppjf'])->name('addendum.printSppjf');
        Route::get('/print-tpbj-kredit/{idPkmk}', [AddendumController::class, 'printTpbj'])->name('addendum.printTpbj');
        Route::get('/print-sptma-kredit/{idPkmk}', [AddendumController::class, 'printSptma'])->name('addendum.printSptma');
    });


    // Rekap
    Route::prefix('rekap')->group(function () {
        Route::get('spk', RekapLivewire::class)->name('rekap.spk');
        Route::get('spk/print-penilaian-ao/{id}/{min}/{max}', [RekapController::class, 'printPenilaianAO'])->name('spk.print');
    });

    // Tracking Apht
    Route::prefix('apht')->group(function () {
        Route::get('tracking-index', TAphtLivewire::class)->name('apht.index');
        Route::get('tracking-show/{id}', [TAphtServices::class, 'showData'])->name('apht.show');
    });



    // LOG
    Route::prefix('log')->group(function () {
        Route::get('/activity', [LogActivityController::class, 'index'])->name('log-activity.index');
        Route::get('/tracking', [LogActivityController::class, 'tracking'])->name('log-tracking');
        Route::get('/tracking/show/{id}', [LogActivityController::class, 'trackingShow'])->name('tracking.show');
        // VERSION
        // Route::get('/latest-version', [LogActivityController::class, 'version'])->name('log.version');
        Route::get('/latest-version', LogAppVersion::class)->name('log.version');
    });
});
