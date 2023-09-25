<x-guest-layout>
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-semibold">Update Tarefa</h1>

        <div class="mt-2">
            <a href="{{ route('tarefas.index') }}" class="px-4 py-3 rounded bg-green-400">Back</a>
        </div>

        <form method="POST" action="{{ route('tarefas.update', $tarefa->id) }}">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <label for="titulo" class="block">Titulo</label>
                <input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value="{{ $tarefa->titulo }}" />
            </div>

            <div class="mt-4">
                <label for="data_criacao" class="block">Data_Criacao</label>
                <input id="data_criacao" class="block mt-1 w-full" type="date" name="data_criacao" value="{{ $tarefa->data_criacao }}" />
            </div>

            <div class="mt-4">
                <label for="data_conclusao" class="block">Data_Conclusao</label>
                <input id="data_conclusao" class="block mt-1 w-full" type="date" name="data_conclusao" value="{{ $tarefa->data_conclusao }}" />
            </div>

            <div class="mt-4">
                <label for="status" class="block">Status</label>
                <input id="status" class="block mt-1 w-full" type="text" name="status" value="{{ $tarefa->status }}" />
            </div>

            <div class="mt-4">
                <label for="descricao" class="block">Descrição</label>
                <textarea id="descricao" class="block mt-1 w-full" name="descricao" rows="5">{{ $tarefa->descricao }}</textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="px-4 py-2 rounded bg-blue-500 text-blue" t>Update</button>
            </div>
        </form>
    </div>
</x-guest-layout>