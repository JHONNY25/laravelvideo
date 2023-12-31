<?php

namespace App\Http\Controllers;

use App\Models\VideoStatistics;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index(){
        return view('statistics');
    }

    public function getStatistics(){
        return DB::table('video_statistics')
        ->select('videos.*', DB::raw('SUM(num_visualizations) as visualizations'),DB::raw('SUM(num_searches) as searches'))
        ->leftJoin('videos','video_statistics.video_id','videos.id')
        ->groupBy('video_id')
        ->paginate(10);
    }

    public function setVisualizationsVideo($videoID){
        $statisticsUser = $this->getStatisticsUser($videoID);

        if($statisticsUser){
            $statisticsUser->num_visualizations += 1;
            $statisticsUser->save();
        }else{
            VideoStatistics::create([
                'user_id' => Auth::id(),
                'video_id' => $videoID,
                'num_visualizations' => 1
            ]);
        }

        return true;
    }

    public function setSearchesVideo($videoID){
        $statisticsUser = $this->getStatisticsUser($videoID);

        if($statisticsUser){
            $statisticsUser->num_searches += 1;
            $statisticsUser->save();
        }else{
            VideoStatistics::create([
                'user_id' => Auth::id(),
                'video_id' => $videoID,
                'num_searches' => 1
            ]);
        }
        return true;
    }

    public function getStatisticsUser($videoID){
        return VideoStatistics::where('user_id',Auth::id())
            ->where('video_id',$videoID)->first();
    }
}
