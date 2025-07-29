<?php

namespace App\Livewire\Lainnya;

use App\Traits\CobaTraitLivewire as TraitsCobaTraitLivewire;
use Livewire\Component;

class CobaTraitLivewire extends Component
{
    use TraitsCobaTraitLivewire;

    public function render()
    {
        return view('livewire.lainnya.coba-trait-livewire');
    }
}
