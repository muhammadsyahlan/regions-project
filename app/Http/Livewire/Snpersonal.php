<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;

class Snpersonal extends Component
{
    public $data;

    public function render()
    {

        return view('livewire.snpersonal');
    }

    public function mount($id)
    {
        $this->data = Person::find($id);
    }
}
