<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ModalVideo;
use App\Models\User;
use App\Models\Videos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ModalVideoTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ModalVideo::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function the_find_video()
    {
        $video = Videos::factory()->create();
        Livewire::test(ModalVideo::class)
            ->call('findVideo',$video->id)
            ->assertEmitted('show-modal')
            ->assertStatus(200);
    }

    /** @test */
    public function the_upload_video()
    {
        $this->setLogin();
        $video = Videos::factory()->create();
        Livewire::test(ModalVideo::class)
            ->set('videoID',$video->id)
            ->set('name',$video->name)
            ->set('description',$video->description)
            ->set('videoID',$video->video_id)
            ->set('url','https://www.youtube.com/embed/hds-xKukets?si=EgAlVaPBe2BE7KXQ')
            ->call('uploadVideo')
            ->assertEmitted('hide-modal')
            ->assertEmitted('refreshShowVideo')
            ->assertRedirect('/dashboard');
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
