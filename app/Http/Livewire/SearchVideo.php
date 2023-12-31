<?php

namespace App\Http\Livewire;

use App\Http\Controllers\VideoController;
use Livewire\Component;

class SearchVideo extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-video');
    }

    public function searchVideo(){
        $this->emit('searchedVideos',$this->search);
    }
}
