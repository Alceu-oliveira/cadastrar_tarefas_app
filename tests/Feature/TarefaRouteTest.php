<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_checking_the_home_page_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_checking_the_tarefas_home_page_returns_a_successful_response(): void
    {
        $response = $this->get('/tarefas');

        $response->assertStatus(200);
    }

    public function test_checking_the_tarefas_home_edit_page_returns_a_successful_response(): void
    {
        $response = $this->get('/tarefas/edit');

        $response->assertStatus(200);
    }

    public function test_checking_the_tarefas_home_create_page_returns_a_successful_response(): void
    {
        $response = $this->get('/tarefas/create');

        $response->assertStatus(200);
    }
}
