<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hobb;

class Hobby extends Component
{

    public $data;
    public $is_open = 0;
    public $postId, $title, $description, $logo;
    public $is_view = 0;
    public $is_add = 0;
    public $dataView;


    public function render()
    {
        $this->data = Hobb::all();

        return view('livewire.hobby');
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

    }

    public function store()
    {
        $this->validate(
            [
                'title' => 'required',
            ]
        );

        Hobb::updateOrCreate(['id' => $this->postId], [
            'hobby_desk' => $this->title,
           
        ]);


        $this->hideModal();

        session()->flash('info', 'Successfully');

        $this->postId = null;
        $this->title = '';

    }

    public function edit($id)
    {

        $data = Hobb::findOrFail($id);

        $this->postId = $id;
        $this->title = $data->hobby_desk;
      
        $this->showModal();
    }

    public function delete($id)
    {

        Hobb::find($id)->delete();
        session()->flash('delete', 'Successfully Deleted');
    }

   

   
 

   

  

   
    
}
