<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Person;

class Snpersonal extends Component
{
    use WithFileUploads;

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
        //$filename = $this->logo->store('public/prov');

        
        $content = $this->keterangan;
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        
    
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imageData = base64_decode($data);
            $image_name= "/storage/public/person/".time().$item.'.png';
            $path = public_path() . $image_name;
            //$imageData->store($path);
            file_put_contents($path, $imageData);
            
            $new_src=asset($image_name);
            $image->removeAttribute('src');
            $image->setAttribute('src', $new_src);

            }
    
        $content = $dom->saveHTML();
        //$content->store('public');
        
        $post = Person::updateOrCreate(['id' => $this->postId], [
            'keterangan' => $content
        ]);
    
        $post->toArray();

        //dd($this->keterangan);
        /*Person::updateOrCreate(['id' => $this->postId], [
            'keterangan' => $this->keterangan
        ]);*/

        redirect()->route('personal');

    }
}
