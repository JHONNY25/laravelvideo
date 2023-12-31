<?php

namespace App\Http\Livewire;

use App\Http\Controllers\VideoController;
use Livewire\Component;

class ModalVideo extends Component
{
    public $name;
    public $description;
    public $url;
    public $videoID = null;
    public $type;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description'  => 'required|string|max:255',
        'url'  => 'required|string|max:255',
    ];

    protected $listeners = [
        'findVideo',
        'setUploadVideo'
    ];


    public function render()
    {
        return view('livewire.modal-video');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function uploadVideo(){
        $this->validate();
        $videoClass = new VideoController();
        if($this->videoID){
            $videoClass->update($this->videoID,$this->name,$this->description,$this->url);
        }else{
            $videoClass->create($this->name,$this->description,$this->url);
        }

        $this->emit('hide-modal');
        $this->emit('refreshShowVideo');

        return redirect()->to('/dashboard');
    }

    public function setData($id,$name,$description,$url){
        $this->videoID = $id;
        $this->name = $name;
        $this->description = $description;
        $this->url = $url;
    }

    public function findVideo($id){
        $videoClass = new VideoController();
        $video = $videoClass->getVideoByID($id);

        $this->setData($video->id,$video->name,$video->description,$video->url);
        $this->emit('show-modal');
    }

    public function setUploadVideo(){
        $this->reset(['id','name','description','url']);

        $this->emit('show-modal');
    }
}
