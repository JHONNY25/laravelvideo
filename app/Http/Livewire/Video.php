<?php

namespace App\Http\Livewire;

use App\Http\Controllers\StatisticsController;
use Livewire\Component;

class Video extends Component
{
    public $url;
    public $videoID;

    protected $listeners = [
        'displayVideo'
    ];

    public function displayVideo($video){
        $this->url = $video['url'];
        $this->videoID = $video['id'];

        $statistics = new StatisticsController();
        $status = $statistics->setVisualizationsVideo($this->videoID);

        if($status){
            $this->emit('display-modal');
        }
    }

    public function render()
    {
        return view('livewire.video');
    }
}
