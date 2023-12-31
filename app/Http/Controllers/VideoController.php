<?php

namespace App\Http\Controllers;

use App\Models\VideoStatistics;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function getVideos(){
        $videos = Videos::orderBy('id','desc')->paginate(10);

        return $videos;
    }

    public function getVideoByID(int $id){
        $videos = Videos::find($id);

        return $videos;
    }

    public function searchVideo(string $search = null){
        if (!empty($search)) {
            $videos = Videos::where('name', 'like', '%' . $search . '%')->orderBy('id','desc')->paginate(10)->setPath ( '' );
        } else {
            $videos = $this->getVideos();
        }

        return $videos;
    }

    public function create($name, $description,$url){
        return Videos::create([
            'name' => $name,
            'description' => $description,
            'url' => $url,
            'user_id' => Auth::id(),
        ]);
    }

    public function delete($id){
        $video = Videos::findOrFail($id);
        VideoStatistics::where('video_id',$id)->delete();

        if ($video->delete() === false) {
            return response(
                "Couldn't delete Video",
                Response::HTTP_BAD_REQUEST
            );
        }

        return response(["deleted" => true], Response::HTTP_OK);
    }

    public function update($id,$name,$description,$url){
        $video = Videos::findOrFail($id);

        $updated = $video->update([
            'name' => $name,
            'description' => $description,
            'url' => $url,
            'user_id' => Auth::id()
        ]);

        return $updated;
    }
}
