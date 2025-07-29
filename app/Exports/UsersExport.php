<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UsersExport implements FromView, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $users = User::with('UserDetails')
            ->where('users.is_deleted', 'false')
            ->get();

        return view('page.master-user.export', compact('users'));
    }

    // change format
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
            'I' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
