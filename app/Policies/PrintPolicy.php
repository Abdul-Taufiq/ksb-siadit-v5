<?php

namespace App\Policies;

use App\Models\MasterPKPMK\PkPmk;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PrintPolicy
{
    public function __construct()
    {
        //
    }

    public function viewPrint(User $user, PkPmk $pkpmk)
    {
        return $user->jabatan === 'Legal' || $user->jabatan === 'TSI'
            ? Response::allow()
            : Response::denyWithStatus(403, 'Anda tidak diizinkan mengakses halaman ini.');
    }

    public function createLegal(User $user)
    {
        if ($user->jabatan === "Legal") {
            return TRUE;
        }
    }
}
