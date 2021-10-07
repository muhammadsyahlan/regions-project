<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prov;

class Member extends Component
{
    public $is_open = 0;
    public function render()
    {
        $data ['prov'] = Prov::select('*')->get();

        return view('livewire.member', $data);
    }

    public function showModal(){
        $this->is_open = true;
    }

    public function hideModal(){
        $this->is_open = false;
    }
}
