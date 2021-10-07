<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prov;

class Member extends Component
{
    public $data;
    public $is_open = 0;
    public $postId, $title, $description;

    public function render()
    {
        $this->data ['prov'] = Prov::select('*')->get();

        return view('livewire.member', $this->data);
    }

    public function showModal(){
        $this->is_open = true;
    }

    public function hideModal(){
        $this->is_open = false;
    }

    public function store(){
       $this->validate(
           [
                'title' => 'required',
                'description' => 'required',
           ]
        );
    Prov::updateOrCreate(['id' => $this->postId],[
        'nama_prov' => $this->title,
        'deskripsi' => $this->description

    ]);

    $this-> hideModal();

    $this-> postId='';
    $this-> title='';
    $this-> description='';
    }

    public function edit($id){

        $data = Prov::findOrFail($id);
        $this->postId = $id;
        $this->title = $data->title;
        $this->description = $data->description;

        $this->showModal();
    }

    public function delete($id){

        Prov::findOrFail($id)->delete();

    }

}
