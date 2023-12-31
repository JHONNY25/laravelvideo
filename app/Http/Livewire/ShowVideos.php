<?php

namespace App\Http\Livewire;

use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\VideoController;
use Livewire\Component;
use Livewire\WithPagination;

class ShowVideos extends Component
{
    use  WithPagination;
    protected $searchedVideos = [];

    protected $listeners = [
        'refreshShowVideo' => '$refresh',
        'successDelete' => '$refresh',
        'searchedVideos',
    ];

    public function mount($searchedVideos){
        $this->searchedVideos = $searchedVideos;
    }

    public function searchedVideos($search){
        $videos = new VideoController();
        $statistics = new StatisticsController();
        $this->searchedVideos = $videos->searchVideo($search);

        if(!empty($this->searchedVideos)){
            foreach($this->searchedVideos as $video){
                $statistics->setSearchesVideo($video->id);
            }
        }
    }

    public function render()
    {
        if(empty($this->searchedVideos)){
            $videos = new VideoController();
            $this->searchedVideos = $videos->getVideos();
        }

        return view('livewire.show-videos',['videos' => $this->searchedVideos]);
    }
}
