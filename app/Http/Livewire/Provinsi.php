<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Prov;

class Provinsi extends Component
{

    use WithFileUploads;

    public $data;
    public $is_open = 0;
    public $postId, $title, $description, $logo;
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
        $this->logo = '';
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'logo' => 'required|mimes:jpg,jpeg,png',
            ]
        );

        
        /*
        $logoNama=$this->logo->storeAs('photos');
        $logoUpload= 'img/';
        $logoNama->move($logoUpload,$logoNama->getClientOriginalName());

        Prov::updateOrCreate(['id' => $this->postId], [
            'nama_prov' => $this->title,
            'deskripsi' => $this->description,
            'logo' => $logoUpload."".$logoNama->getClientOriginalName()

        ]);
        */

        $filename = $this->logo->store('public/prov');

        Prov::updateOrCreate(['id' => $this->postId], [
            'nama_prov' => $this->title,
            'deskripsi' => $this->description,
            'logo' => $filename
        ]);


        $this->hideModal();

        session()->flash('info', 'Successfully');

        $this->postId = null;
        $this->title = '';
        $this->description = '';
        $this->logo = '';

        //return redirect()->route('dashboard');

    }

    public function edit($id)
    {

        $data = Prov::findOrFail($id);

        $this->postId = $id;
        $this->title = $data->nama_prov;
        $this->description = $data->deskripsi;
        $this->logo = $data->logo;

        $this->showModal();
    }

    public function delete($id)
    {

        Prov::find($id)->delete();
        session()->flash('delete', 'Successfully Deleted');
    }

    public function view($id)
    {

        redirect()->route('vprovinsi',['id' => $id]);
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

    private function generateHashNameWithOriginalNameEmbedded($file)
    {
        $hash = Str::random(30);
        $meta = '-meta' . base64_encode($file->getClientOriginalName()) . '-';
        $extension = '.' . $file->guessExtension();

        return $hash . $meta . $extension;
    }
}
