<?php

namespace App\Http\Livewire;

use App\Http\Controllers\StatisticsController;
use Livewire\Component;

class ShowStatistics extends Component
{
    public function render()
    {
        $statistics = new StatisticsController();
        return view('livewire.show-statistics',['statistics' => $statistics->getStatistics()]);
    }
}
