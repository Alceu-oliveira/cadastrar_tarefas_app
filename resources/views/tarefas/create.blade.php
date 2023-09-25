<x-guest-layout>
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-semibold">Create Tarefa</h1>

        <div class="mt-2">
            <a href="{{ route('tarefas.index') }}" class="px-4 py-3 rounded bg-green-400">Back</a>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-xl">{{('Create Tarefa') }}</h1>

                <form method="POST" action="{{ route('tarefas.store') }}">
                    @csrf

                    <div class="mt-4">
                        <label for="titulo" class="block">Titulo</label>
                        <input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value="{{ old('name') }}" />
                    </div>

                    <div class="mt-4">
                        <label for="data_criacao" class="block">Data Criacao</label>
                        <input id="data_criacao" class="block mt-1 w-full" type="date" name="data_criacao" value="{{ old('type') }}" />
                    </div>

                    <div class="mt-4">
                        <label for="data_conclusao" class="block">Data Conclusao</label>
                        <input id="data_conclusao" class="block mt-1 w-full" type="date" name="data_conclusao" />
                    </div>

                    <div class="mt-4">
                        <label for="status" class="block">Status</label>
                        <select id="status" class="block mt-1 w-full" name="status">
                            <option value="pendente">Pendente</option>
                            <option value="concluido">Concluido</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="descricao" class="block">Descricao</label>
                        <textarea id="descricao" class="block mt-1 w-full" name="descricao" rows="5"></textarea>
                    </div>

                    <div class="col">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="px-4 py-2 rounded bg-blue-500 text-white">{{ __('Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

