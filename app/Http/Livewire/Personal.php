<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use App\Models\Prov;
use App\Models\Koka;


class Personal extends Component
{
    public $data;
    public $is_open = 0;
    public $postId, $title, $jkradio, $goldar, $alamat, $kotkab, $prov, $hobby, $description;
    public $dataKotkab, $dataProv;


    public function render()
    {
        $this->data = Person::with('prov','kotkab')->get();

        $this->dataProv = Prov::pluck('nama_prov');

        $this->dataKotkab = Koka::pluck('nama_kotkab');
        

        return view('livewire.personal');
    }

    public function showModal()
    {
        $this->is_open = true;
    }

    public function hideModal()
    {
        $this->is_open = false;

        $this->postId = null;
        $this->title = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );

        Person::updateOrCreate(['id' => $this->postId], [
            'nama_prov' => $this->title,
            'deskripsi' => $this->description

        ]);

        $this->hideModal();

        session()->flash('info', 'Successfully');

        $this->postId = null;
        $this->title = '';
        $this->description = '';

        //return redirect()->route('dashboard');

    }

    public function edit($id)
    {

        $data = Person::findOrFail($id);

        $this->postId = $id;
        $this->title = $data->nama_prov;
        $this->description = $data->deskripsi;

        $this->showModal();
    }

    public function delete($id)
    {

        Person::find($id)->delete();
        session()->flash('delete', 'Successfully Deleted');
    }

    
}
