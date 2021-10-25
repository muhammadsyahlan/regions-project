<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prov;
use App\Models\Koka;
class Vprovinsi extends Component
{

    public $data;
    public $kotkab;

    public function render()
    {
        return view('livewire.vprovinsi');
    }


    public function mount($id)
    {
       $this->data = Prov::find($id);

       $this->kotkab = Koka::where('prov_id',$id)->get();
    }





}




