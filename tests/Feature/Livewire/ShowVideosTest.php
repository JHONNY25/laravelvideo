<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ModalVideo;
use App\Http\Livewire\SearchVideo;
use App\Http\Livewire\ShowVideos;
use App\Http\Livewire\Video;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ShowVideosTest extends TestCase
{

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowVideos::class,['searchedVideos' => []]);

        $component->assertStatus(200);
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

    /** @test */
    public function show_video_page_contains_search_video_component()
    {
        $this->setLogin();

        $this->get('/dashboard')->assertSeeLivewire(SearchVideo::class);
    }

    /** @test */
    public function show_video_page_contains_modal_video_component()
    {
        $this->setLogin();
        $this->get('/dashboard')->assertSeeLivewire(ModalVideo::class);
    }

    /** @test */
    public function show_video_page_contains_video_component()
    {
        $this->setLogin();
        $this->get('/dashboard')->assertSeeLivewire(Video::class);
    }
}
