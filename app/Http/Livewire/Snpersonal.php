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
        $storage = "public/person/";
    
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= time().$item.'.png';
            $path = $storage . $image_name;
            
            $new_src=asset($path);
            $image->removeAttribute('src');
            $image->setAttribute('src', $new_src);
            }
    
        $content = $dom->saveHTML();
        $post = Person::updateOrCreate(['id' => $this->postId], [
            'keterangan' => $content
        ]);
    
        dd($post->toArray());

        //dd($this->keterangan);
        /*Person::updateOrCreate(['id' => $this->postId], [
            'keterangan' => $this->keterangan
        ]);*/

        redirect()->route('personal');

    }
}
