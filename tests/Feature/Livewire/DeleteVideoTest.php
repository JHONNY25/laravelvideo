<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\DeleteVideo;
use App\Models\Videos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteVideoTest extends TestCase
{

    /** @test */
    public function test_delete_in_component(){
        $video = Videos::factory()->create();
        Livewire::test(DeleteVideo::class,['videoID' => $video->id])
            ->call('delete')
            ->assertEmitted('successDelete')
            ->assertStatus(200);

    }
}
