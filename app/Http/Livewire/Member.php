<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prov;

class Member extends Component
{
    public function render()
    {
        $data ['prov'] = Prov::select('*')->get();

        return view('livewire.member', $data);
    }
}
