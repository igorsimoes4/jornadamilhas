<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Depoimentos;

class DepoimentosTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa a requisição GET no endpoint /depoimentos.
     *
     * @return void
     */
    public function testGetDepoimentos()
    {
        $response = $this->get('/api/depoimentos-home');
        $response->assertStatus(200);
    }

    /**
     * Testa a requisição POST no endpoint /depoimentos.
     *
     * @return void
     */
    public function testPostDepoimento()
    {
        $data = [
            'depoimento' => 'Este é um depoimento de teste',
            'nome_user' => 'Test User',
        ];

        $response = $this->postJson('/api/depoimentos/create', $data);
        $response->assertStatus(201);
    }

    /**
     * Testa a requisição PUT no endpoint /depoimentos/{id}.
     *
     * @return void
     */
    public function testPutDepoimento()
    {
        $depoimento = Depoimentos::factory()->create();

        $data = [
            'depoimento' => 'Depoimento atualizado',
            'nome_user' => 'Updated User',
        ];

        $response = $this->putJson("/api/depoimentos/{$depoimento->id}", $data);
        $response->assertStatus(200);
    }

    /**
     * Testa a requisição DELETE no endpoint /depoimentos/{id}.
     *
     * @return void
     */
    public function testDeleteDepoimento()
    {
        $depoimento = Depoimentos::factory()->create();

        $response = $this->delete("/api/depoimentos/{$depoimento->id}");
        $response->assertStatus(200);
    }
}
