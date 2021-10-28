<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Prov;
use App\Models\Koka;

class Provinsi extends Component
{

    use WithFileUploads;

    public $data;
    public $is_open = 0;
    public $postId, $title, $description, $logo;
    public $is_view = 0;
    public $is_add = 0;
    public $dataView;
    public $idProv;
    public $edit_open = 0;
    


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

        Prov::select('*')->insert([
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

       

    }

    //edit

    public function showEdit()
    {
        $this->edit_open = true;
    }

    public function hideEdit()
    {
        $this->edit_open = false;

        $this->postId = null;
        $this->title = '';
        $this->description = '';
        $this->logo = '';
    }

    public function edit($id)
    {

        $data = Prov::findOrFail($id);

        $this->postId = $id;
        $this->title = $data->nama_prov;
        $this->description = $data->deskripsi;
        $this->logo = $data->logo;

        $this->showEdit();
    }

    public function editLogo()
    {

        $this->logo = null;
    }

    //update

    public function update()
    {
        $this->validate(
            [
                'title' => 'required',
                'description' => 'required',
            ]
        );

        /*

        $cari = strpos($this->logo, 'public/prov');

        if($cari !== false ) {

            $filename = $this->logo;

        }
        else {
            
            $filename = $this->logoedit->store('public/prov');
            
        }
        */

        $prov = Prov::findOrFail($this->postId);

        if($this->logo != $prov->logo) {
            $filename = $this->logo->store('public/prov');
        }
        else {
            $filename = $this->logo;
        }

        

        


        Prov::select('*')->where('id', $this->postId )
        ->update([
            'nama_prov' => $this->title,
            'deskripsi' => $this->description,
            'logo' => $filename
        ]);
       

        $this->hideEdit();

        session()->flash('info', 'Successfully');

        $this->postId = null;
        $this->title = null;
        $this->description = null;
        $this->logo = null;
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

    //kotkabAdd

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
        $this->showAdd();

        $this->idProv = $id;

    }

    public function store2()
    {
        $this->validate(
            [
                 'title' => 'required',
                 'description' => 'required',
            ]
         );
 
         Koka::updateOrCreate(['id' => $this->postId],[
             'prov_id'      =>  $this->idProv,
             'nama_kotkab' => $this->title,
             'desk_kk' => $this->description,
 
         ]);
 
         $this->hideAdd();
 
         session()->flash('info', 'Successfully' );
 
         $this-> postId=null;
         $this-> title='';
         $this-> description='';

       

    }
    

   
}
