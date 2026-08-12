<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <section class="container px-4 mx-auto">
                <div class="flex items-center gap-x-3">
                    <h2 class="text-2xl font-medium text-gray-800 dark:text-white">Pacientes / Clientes de la App</h2>
                    <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ $clients->total() }} registrados</span>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <div class="flex items-center gap-x-3">
                                                    <span>Cliente</span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Correo Electrónico
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Fecha de Registro
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        @foreach($clients as $client)
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center gap-x-3">
                                                        <div class="flex items-center justify-center w-10 h-10 text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800">
                                                            <span class="font-semibold text-lg">{{ strtoupper(substr($client->name, 0, 1)) }}</span>
                                                        </div>
                                                        <span>
                                                            <h2 class="font-medium text-gray-800 dark:text-white">{{ $client->name }}</h2>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                        <h2 class="text-sm font-normal text-emerald-500">{{ $client->email }}</h2>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $client->created_at->format('d/m/Y') }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        @if($clients->isEmpty())
                                            <tr>
                                                <td colspan="3" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                                    Aún no hay clientes registrados desde la aplicación móvil.
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:flex sm:items-center sm:justify-between">
                    {{ $clients->links() }}
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
