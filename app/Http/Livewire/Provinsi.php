<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prov;

class Provinsi extends Component
{
    public function render()
    {
        return view('livewire.provinsi',
        ['prov' => Prov::select('*')->get(),]
    );
    }
}
