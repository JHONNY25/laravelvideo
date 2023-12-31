<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchVideo;
use App\Models\Videos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchVideoTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SearchVideo::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function test_search_video()
    {
        Livewire::test(SearchVideo::class)
            ->call('searchVideo')
            ->assertEmitted('searchedVideos')
            ->assertStatus(200);
    }
}
