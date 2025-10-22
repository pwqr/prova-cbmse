<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function usuario_pode_criar_uma_categoria()
    {
        $response = $this->post('/categories', [
            'name' => 'Roupas',
            'description' => 'Vestir',
        ]);

        $response->assertRedirect('/categories');
        $this->assertDatabaseHas('categories', ['name' => 'Roupas']);
    }

    public function usuario_pode_editar_categoria()
    {
        $category = Category::factory()->create();

        $response = $this->put("/categories/{$category->id}", [
            'name' => 'Celulares atualizados',
            'description' => 'atualizado',
        ]);

        $response->assertRedirect('/categories');
        $this->assertDatabaseHas('categories', ['name' => 'Celulares atualizados']);
    }

    /** @test */
    public function usuario_pode_excluir_categoria()
    {
        $category = Category::factory()->create();

        $response = $this->delete("/categories/{$category->id}");

        $response->assertRedirect('/categories');
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
