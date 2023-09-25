<?php

namespace Tests\Feature;

use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaCrudTest extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_store_new_Tarefa()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('/tarefas', [
            'titulo' => ' testes',
            'data_criacao' => '2023-09-24',
            'data_conclusao' => '2023-09-27',
            'status' => 'pendente',
            'descricao' => 'Fazer testes unitarios'
        ]);
        // dd($response->getContent());
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/tarefas');
        $this->assertCount(1, Tarefa::all());
        $this->assertDatabaseHas('tarefas', ['testes' => '2023-09-24', '2023-09-27' => 'pendente', 'Fazer testes unitários' ]);
    }

    public function test_admin_can_see_the_edit_Tarefa_page()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $Tarefa = Tarefa::factory()->create();
        $response = $this->actingAs($admin)->get('/tarefas/'. $Tarefa->id. '/edit');
        $response->assertStatus(200);
        $response->assertSee($Tarefa->name);
    }

    public function test_admin_can_update_Tarefa()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        Tarefa::factory()->create();
        $this->assertCount(1, Tarefa::all());
        $Tarefa = Tarefa::first();
        $response = $this->actingAs($admin)->put('/tarefas/'. $Tarefa->id, [
            'titulo'  => 'Updated Tarefa',
            'data_criacao' => '2023-09-24',
            'data_conclusao' => '2023-09-26',
            'status' => 'pendente',
            'descricao' => 'Fazer todos os testes '
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/tarefas');
        $this->assertEquals('Updated Tarefa', Tarefa::first()->name);
        $this->assertEquals('Test', Tarefa::first()->type);
        $this->assertEquals('tarefa', Tarefa::first()->price);
    }

    public function test_admin_can_delete_Tarefa()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
       $Tarefa =  Tarefa::factory()->create();
       $this->assertEquals(1, Tarefa::count());
       $response = $this->actingAs($admin)->delete('/Tarefas/'. $Tarefa->id);
       $response->assertStatus(302);
       $this->assertEquals(0, Tarefa::count());
    }
}