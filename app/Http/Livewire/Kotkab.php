<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Koka;
use App\Models\Prov;

class Kotkab extends Component
{
    public $data;
    public $dataProv;
    public $is_open = 0;
    public $postId, $title, $description, $prov;

    public function render()
    {
        $this->data = Koka::with('prov')->get();
        
        $this->dataProv = Prov::pluck('nama_prov');

        return view('livewire.kotkab');
    } 

    public function showModal(){
        $this->is_open = true;
    }

    public function hideModal(){
        $this->is_open = false;

        $this-> postId=null;
        $this-> title='';
        $this-> prov='';
        $this-> description='';
        
    }

    public function store(){
        $p = Prov::where('nama_prov', $this->prov)->first();

        $this->validate(
           [
                'title' => 'required',
                'prov' => 'required',
                'description' => 'required',
           ]
        );

        Koka::updateOrCreate(['id' => $this->postId],[
            'prov_id'      => $p->id,
            'nama_kotkab' => $this->title,
            'desk_kk' => $this->description,

        ]);

        $this->hideModal();

        session()->flash('info', 'Successfully' );

        $this-> postId=null;
        $this-> title='';
        $this-> prov='';
        $this-> description='';
        
        //return redirect()->route('dashboard');
        
    }

    public function edit($id){

        $data = Koka::findOrFail($id);

        $p = Prov::where('id', $data->prov_id)->first();

        $this->postId = $id;
        $this->title = $data->nama_kotkab;
        $this->prov= $p->nama_prov;
        $this->description = $data->desk_kk;

        $this->showModal();
    }

    public function delete($id){

        Koka::find($id)->delete();
        session()->flash('delete','Successfully Deleted');

    }
}
