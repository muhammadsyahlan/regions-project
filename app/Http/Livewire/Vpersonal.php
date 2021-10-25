<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;

class Vpersonal extends Component
{

    public $data;

    public function render()
    {
        return view('livewire.vpersonal');
    }

    public function mount($id)
    {
        $this->data = Person::find($id);
    }
}
