<?php

namespace App\Livewire\MasterKredit\Muk;

use App\Models\MasterKredit\Debitur;
use App\Models\MasterKredit\Kredit;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class AddMukLivewire extends Component
{
    // prepare
    public $id, $metode;
    // inputan

    public function mount($id)
    {
        $this->id = base64_decode($id);
        $this->metode = null;
    }

    public function render()
    {
        $kredit = Kredit::find($this->id);
        $debitur = Debitur::find($kredit->id_debitur);

        // untuk mengecualikan error
        /** @disregard P1013 Undefined method */
        return view('livewire.master-kredit.muk.add-muk-livewire', [
            'kredit' => $kredit,
            'debitur' => $debitur
        ])
            ->extends('livewire.komponen.layouts.app', ['title' => 'Add Data MUK'])
            ->section('livewire-konten');
    }
}
