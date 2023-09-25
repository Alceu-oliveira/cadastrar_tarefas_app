<x-guest-layout>
    <div class="max-w-6xl mx-auto">
        <h1>Tarefas list</h1>
        <div class="m-2 p-2">
            @auth()
                <!-- TODO remover primeiro link após resolver problema de autenticação nas rotas -->
                <a class="px-4 py-3 rounded bg-green-400" href="{{ route('tarefas.create') }}">Create</a>
                @if(auth()->user()->is_admin)
                <a class="px-4 py-3 rounded bg-green-400" href="{{ route('tarefas.create') }}">Create</a>
                @endif
            @endauth
        </div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Titulo
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Data Criacao</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Data Conclusao</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($tarefas as $tarefa)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $tarefa['titulo'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $tarefa['data_criacao'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $tarefa['data_conclusao'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $tarefa['status'] }}
                                    </td>
                                                

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @auth()
                                        <button class="px-4 py-2 rounded-lg bg-blue-400">Buy tarefa</button>
                                        <a href="{{ route('tarefas.edit', $tarefa['id']) }}">Edit</a>
                                        @endauth
                                    </td>
                                </tr>
                                @empty
                                <p>Sem tarefas</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>