<?php

declare(strict_types=1);

use App\Filament\Resources\GenreResource;
use App\Filament\Resources\GenreResource\Pages\CreateGenre;
use Domains\Genre\Projections\Genre;
use Livewire\Livewire;
use Tests\TestCase;

class CreateGenreTest extends TestCase
{
    /**
     * test_it_can_render_create_genre_page
     */
    public function test_it_can_render_create_genre_page(): void
    {
        $this->get(GenreResource::getUrl('index'))->assertSuccessful();
    }

    public function test_it_can_create_genre(): void
    {
        $genre = Genre::factory()->make();

        Livewire::test(CreateGenre::class)
            ->fillForm([
                'name' => $genre->name,
                'description' => $genre->description,
            ])
            ->call('create')
            ->assertHasNoErrors();

        $this->assertDatabaseHas(Genre::class, [
            'name' => $genre->name,
            'description' => $genre->description,
        ]);
    }
}
