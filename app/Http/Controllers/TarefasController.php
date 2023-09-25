<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tarefasController extends Controller {

    public function index()
    {
        //usaremos a model para buscar tarefas
        // select * from tarefas order by titulo asc
        $listtarefas = DB::table('tarefas')->orderBy('titulo', 'asc')->get();

        $listtarefas = json_decode($listtarefas, true);

        $total = DB::table('tarefas')->count();
        return view('tarefas.index', ['tarefas' => $listtarefas, 'total' => $total]);

    }

    //método irá retornar a view com o form
    public function create(){
        return view('tarefas.create');
    }

     //função chamada no submit do form..será um POST com os dados
     public function store(Request $request) {
        $request->validate([
            'titulo' => ['required'],
            'data_criacao' => ['required'],
            'data_conclusao' => ['required'],
            'status' => ['required'],
            'descricao' => ['required']
        ]);
        //Tarefa::create($validated);
        Tarefa::create([
            'titulo' => $request->titulo,
            'data_criacao' => $request->data_criacao,
            'data_conclusao' => $request->data_conclusao,
            'status' => $request->status,
            'descricao' => $request->descricao
        ]);
        return redirect('tarefas')->with('success', 'Tarefa cadastrada com sucesso!');
    }

    public function edit($id) {
        //find é o método que faz select * from tarefas where id= ?
        $tarefa = Tarefa::find($id);
        //retornamos a view passando a TUPLA de tarefa consultado
        return view('tarefas.edit', ['tarefa' => $tarefa]);
    }
        
    public function update(Request $request) {
        //find é o método que faz select * from tarefas where id= ?
        $tarefa = Tarefa::find($request->id);
        //método update faz um update tarefa set titulo = ?, descricao=? ...
        $tarefa->update([
            'titulo' => $request->titulo,
            'data_criacao' => $request->data_criacao,
            'data_conclusao' => $request->data_conclusao,
            'status' => $request->status,
            'descricao' => $request->descricao
        ]);

        return redirect('/tarefas')->with('success', 'tarefa salvo com sucesso');
    }

    public function destroy($id) {
        //select * from tarefa where id = ?
        $tarefa = Tarefa::find($id);
        //deleta o tarefa no banco
        $tarefa->delete();
        return redirect('/tarefas');
    }

}

