<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;

class Snpersonal extends Component
{
    public $data;
    public $postId, $keterangan;

    public function render()
    {

        return view('livewire.snpersonal');
    }

    public function mount($id)
    {
        
        $this->data = Person::find($id);

        $this->postId = $id;
    }

    public function store()
    {
        
        //dd($this->keterangan);
        Person::updateOrCreate(['id' => $this->postId], [
            'keterangan' => $this->keterangan
        ]);

        redirect()->route('personal');

    }
}
