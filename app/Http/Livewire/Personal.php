<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use App\Models\Prov;
use App\Models\Koka;
use App\Models\Hobb;


class Personal extends Component
{
    public $data;
    public $is_open = 0;
    public $postId, $title, $jkradio, $goldar, $alamat, $kotkab, $prov;
    public $hobby = [];
    public $dataKotkab, $dataProv, $dataHob;


    public function render()
    {
        $this->data = Person::with('prov','kotkab','hobby')->get();

        $this->dataProv = Prov::get();

        $this->dataKotkab = Koka::get();

        $this->dataHob = Hobb::get();
        

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
        $this->jkradio = '';
        $this->goldar = '';
        $this->alamat = '';
        $this->kotkab = '';
        $this->prov = '';
        $this->hobby = '';
    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'required',
                'jkradio' => 'required',
                'goldar' => 'required',
                'alamat' => 'required',
                'kotkab' => 'required',
                'prov' => 'required',
                'hobby' => 'required',
            ]
        );

        Person::updateOrCreate(['id' => $this->postId], [
            'nama' => $this->title,
            'gender' => $this->jkradio,
            'goldar' => $this->goldar,
            'alamat' => $this->alamat,
            'kotkab_id' => $this->kotkab,
            'prov_id' => $this->prov,
            'hobby_id' => implode(",",$this->hobby) ,
        ]);

        $this->hideModal();

        session()->flash('info', 'Successfully');

        $this->postId = null;
        $this->title = '';
        $this->jkradio = '';
        $this->goldar = '';
        $this->alamat = '';
        $this->kotkab = '';
        $this->prov = '';
        $this->hobby = '';

        //return redirect()->route('dashboard');

    }

    public function edit($id)
    {

        $data = Person::findOrFail($id);

        $this->postId = $id;
        $this->title = $data->nama;
        $this->jkradio = $data->gender;
        $this->goldar = $data->goldar;
        $this->alamat = $data->alamat;
        $this->kotkab = $data->kotkab_id;
        $this->prov = $data->prov_id;
        $this->hobby = explode(",",$data->hobby_id);

        $this->showModal();
    }

    public function delete($id)
    {

        Person::find($id)->delete();
        session()->flash('delete', 'Successfully Deleted');
    }

    public function input($id)
    {

        redirect()->route('snpersonal',['id' => $id]);
    }

    public function view($id)
    {

        redirect()->route('vpersonal',['id' => $id]);
    }

    
}
