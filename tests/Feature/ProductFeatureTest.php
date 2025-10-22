<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function usuario_pode_criar_produto()
    {
        $category = Category::factory()->create();

        $response = $this->post('/products', [
            'name' => 'Notebook',
            'description' => 'Alto desempenho',
            'price' => 4999.99,
            'quantity' => 5,
            'category_id' => $category->id,
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', ['name' => 'Notebook']);
    }

    public function usuario_pode_editar_produto()
    {
        $product = Product::factory()->create();

        $response = $this->put("/products/{$product->id}", [
            'name' => 'Produto atualizado',
            'description' => 'Descrição nova',
            'price' => 2500.00,
            'quantity' => 8,
            'category_id' => $product->category_id,
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', ['name' => 'Produto atualizado']);
    }

    public function usuario_pode_excluir_produto()
    {
        $product = Product::factory()->create();

        $response = $this->delete("/products/{$product->id}");

        $response->assertRedirect('/products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
