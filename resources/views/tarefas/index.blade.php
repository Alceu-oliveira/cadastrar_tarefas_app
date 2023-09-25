@extends('template_crud')
@section('content')
    <div class="card">

        <div class="card-header">
            <h2>Lista de tarefas</h2>

            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <a class="btn btn-success float-end" href="{{ url('/tarefas/create') }}">Cadastrar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <tr>
                                <th>Titulo</th>
                                <th>Data Criacao</th>
                                <th>Data Conclusao</th>
                                <th>Status</th>
                                <th>Descricao</th>
                                                            
                            </tr>
                            @foreach($tarefas as $tarefa)
                                <tr>
                                    <td>{{ $tarefa['titulo'] }} </td>
                                    <td>{{ $tarefa['data_criacao'] }} </td>
                                    <td>{{ $tarefa['data_conclusao'] }}</td>
                                    <td>{{ $tarefa['status'] }}</td>
                                    <td>{{ $tarefa['descricao'] }}</td>
                                    
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ url('/tarefas/editar', ['id' => $tarefa['id']]) }}">Editar</a>
                                        <a onclick="funConfirma(this)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            class="btn btn-danger"
                                            href="{{ url('/tarefas/delete', ['id' => $tarefa['id']]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                                            <tr>
                                                <td> Total de tarefas  {{ $total}}</td>
                                            </tr>


                        </table>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-secondary float-end" href="{{ url('/dashboard') }}">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir essa tarefa?
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <a id="btnConfirma" href="" class="btn btn-primary">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<script>
    function funConfirma(elemento) {
        console.log('chamou a funcao');
        document.getElementById('btnConfirma').setAttribute('href', elemento.href);
    }
</script>
