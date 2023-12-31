<?php

namespace Tests\Unit\Video;

use App\Http\Controllers\VideoController;
use App\Models\User;
use App\Models\Videos;
use Tests\TestCase;

class VideoTest extends TestCase
{
    public function tests_get_videos(){
        $video = new VideoController();
        Videos::factory()->create();

        $this->assertNotEmpty($video->getVideos());
    }

    public function tests_get_videos_by_id(){
        $video = new VideoController();
        $videoFactory = Videos::factory()->create();

        $videoData = $video->getVideoByID($videoFactory->id);
        $this->assertEquals($videoData->id,$videoFactory->id);
    }

    public function tests_search_videos(){
        $video = new VideoController();
        $videoFactory = Videos::factory()->create();

        $videoData = $video->searchVideo($videoFactory->name);

        $this->assertNotEmpty($videoData);
    }

    public function tests_search_videos_with_null_text(){
        $video = new VideoController();
        $videoData = $video->searchVideo();

        $this->assertNotEmpty($videoData);
    }

    public function tests_create_videos(){
        $video = new VideoController();
        $this->setLogin();
        $videoData = $video->create(
            'Nuevo video de test',
            'Descripción desde test',
            'https://www.youtube.com/embed/5998zXKG6n8?si=FXC8EUvTwKh8-0Ac');

        $this->assertNotEmpty($videoData);
    }

    public function setLogin(){
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $this->from('/login')->post('/login', [
            'email'    => $user->email,
            'password' => 'password',
        ]);
    }
}
