<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Video;
use App\Models\User;
use App\Models\Videos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class VideoTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $video = Videos::factory()->create();
        Livewire::test(Video::class,[
            'url' => $video->url,
            'id' => $video->id])
            ->assertStatus(200);

    }

    /** @test */
    public function test_display_video()
    {
        $this->setLogin();
        $video = Videos::factory()->create();
        Livewire::test(Video::class,)
            ->call('displayVideo',[
                'url' => $video->url,
                'id' => $video->id])
            ->assertEmitted('display-modal')
            ->assertStatus(200);
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
