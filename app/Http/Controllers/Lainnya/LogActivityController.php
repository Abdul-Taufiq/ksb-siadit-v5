<?php

namespace App\Http\Controllers\Lainnya;

use App\Http\Controllers\Controller;
use App\Models\MasterKredit\Kredit;
use App\Models\Output\LogActivity;
use App\Models\Output\TrackingSPK;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    public function index(Request $request)
    {
        return view('page.lainnya.log-activity', ['title' => 'Log Activity User']);
    }


    public function tracking()
    {
        return view('page.lainnya.log-tracking', [
            'title' => 'Log Tracking SPK'
        ]);
    }


    public function trackingShow($id)
    {
        $ids = base64_decode($id);

        $kredit = Kredit::with('ktracking')->find($ids);

        return view('page.lainnya.log-tracking-show', [
            'title' => 'Show Log Tracking SPK',
            'kredit' => $kredit
        ]);
    }


    public function version()
    {
        return view('page.lainnya.log-version', [
            'title' => 'Log Version'
        ]);
    }
}
