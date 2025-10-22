<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function uma_categoria_pode_ter_varios_produtos()
    {
        $category = Category::factory()->create();
        Product::factory()->count(3)->create(['category_id' => $category->id]);

        $this->assertCount(3, $category->products);
    }

    public function o_nome_da_categoria_e_formatado_corretamente()
    {
        $category = Category::create(['name' => 'celulares']);
        $this->assertEquals('Celulares', $category->name);
    }

    public function ao_deletar_categoria_os_produtos_relacionados_sao_excluidos()
    {
        $category = Category::factory()->create();
        Product::factory()->count(2)->create(['category_id' => $category->id]);

        $category->delete();

        $this->assertDatabaseMissing('products', ['category_id' => $category->id]);
    }
}
