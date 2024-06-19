<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("AQUI VA EL CALENDARIO") }}
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre del paciente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hora
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Teléfono
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendas->where('atendida', 0) as $agenda)
                            @php
                                $paciente = $pacientes->find($agenda->id_paciente_agenda);
                            @endphp
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $paciente->nombre_completo }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $agenda->fecha }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $agenda->hora }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $agenda->telefono }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
