<?php

namespace App\Http\Livewire;

use App\Http\Controllers\VideoController;
use Livewire\Component;

class DeleteVideo extends Component
{
    public $videoID;

    public function mount($videoID){
        $this->videoID = $videoID;
    }

    public function delete(){
        $videoClass = new VideoController();
        $videoClass->delete($this->videoID);

        $this->emit('successDelete');

    }

    public function render()
    {
        return view('livewire.delete-video');
    }
}
