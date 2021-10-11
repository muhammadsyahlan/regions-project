<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prov;

class Provinsi extends Component
{
    public $data;
    public $is_open = 0;
    public $postId, $title, $description;
    public $is_view = 0;
    public $is_add = 0;
    public $dataView;


    public function render()
    {
        $this->data = Prov::all();

        return view('livewire.provinsi');
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

        Prov::updateOrCreate(['id' => $this->postId], [
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

        $data = Prov::findOrFail($id);

        $this->postId = $id;
        $this->title = $data->nama_prov;
        $this->description = $data->deskripsi;

        $this->showModal();
    }

    public function delete($id)
    {

        Prov::find($id)->delete();
        session()->flash('delete', 'Successfully Deleted');
    }

    public function showView()
    {
        $this->is_view = true;
    }

    public function view($id)
    {

        $this->showView();

        $this->dataView = Prov::select('*')->join('kotkab', 'prov.id', '=', 'kotkab.prov_id')->where('prov_id', $id)->get();
    }

 

    public function showAdd()
    {
        $this->is_add = true;
    }

    public function hideAdd()
    {
        $this->is_add = false;

        $this->postId = null;
        $this->title = '';
        $this->description = '';
    }

    public function add($id)
    {

    }
}
