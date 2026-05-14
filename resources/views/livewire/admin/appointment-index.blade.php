<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Citas</h1>
    </div>

    <!-- Action Bar -->
    <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700 mb-4">
        <div class="flex items-center mb-4 sm:mb-0">
            <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" wire:model.live="search" id="appointments-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Buscar citas (Paciente o Médico)">
            </div>
        </div>
        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
            <button wire:click="sendManualReport" wire:loading.attr="disabled" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                <i class="fas fa-envelope-open-text mr-2 text-indigo-600" wire:loading.remove wire:target="sendManualReport"></i>
                <i class="fas fa-spinner fa-spin mr-2 text-indigo-600" wire:loading wire:target="sendManualReport"></i>
                Enviar Reporte Hoy
            </button>
            <a href="{{ route('admin.appointments.create') }}" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Nueva Cita
            </a>
            <button type="button" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                Columnas <i class="fas fa-chevron-down ml-2 text-xs"></i>
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Paciente</th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Doctor</th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Fecha</th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Hora</th>
                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Estatus</th>
                                <th scope="col" class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @forelse($appointments as $appointment)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $appointment->patient->user->name ?? 'N/A' }}</div>
                                        <div class="text-xs font-normal text-gray-500 dark:text-gray-400">{{ $appointment->patient->user->email ?? '' }}</div>
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $appointment->doctor->name ?? 'N/A' }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $appointment->date->format('d M, Y') }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div class="text-xs font-bold text-gray-900 dark:text-white">
                                            {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}
                                        </div>
                                        <div class="text-[10px] text-gray-400 italic">
                                            hasta {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i A') }}
                                        </div>
                                    </td>
                                    <td class="p-4 whitespace-nowrap">
                                        @php
                                            $statusBadges = [
                                                1 => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                                                2 => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                                                3 => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                                            ];
                                            $statusLabels = [1 => 'Pendiente', 2 => 'Completada', 3 => 'Cancelada'];
                                        @endphp
                                        <span class="{{ $statusBadges[$appointment->status] ?? 'bg-gray-100 text-gray-800' }} text-xs font-medium px-2.5 py-0.5 rounded-md">
                                            {{ $statusLabels[$appointment->status] ?? 'Desconocido' }}
                                        </span>
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap text-center">
                                        <div class="inline-flex rounded-md shadow-sm" role="group">
                                            <a href="{{ route('admin.appointments.consultation', $appointment) }}" class="inline-flex items-center px-3 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" title="Atender Consulta">
                                                <i class="fas fa-stethoscope"></i>
                                            </a>
                                            <a href="{{ route('admin.appointments.download', $appointment) }}" class="inline-flex items-center px-3 py-2 text-xs font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" title="Descargar Comprobante PDF">
                                                <i class="fas fa-file-pdf text-red-600"></i>
                                            </a>
                                            <button type="button" wire:click="edit({{ $appointment->id }})" class="inline-flex items-center px-3 py-2 text-xs font-medium text-gray-900 bg-white border-l border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" onclick="confirmDelete({{ $appointment->id }})" class="inline-flex items-center px-3 py-2 text-xs font-medium text-red-600 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 dark:bg-gray-700 dark:border-gray-600 dark:text-red-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-red-500 dark:focus:text-white">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No se encontraron citas registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer / Pagination -->
    <div class="mt-4">
        {{ $appointments->links() }}
    </div>

    <!-- Edit Modal -->
    @if($isOpen)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="$set('isOpen', false)"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-200 dark:border-gray-700">
                <form wire:submit.prevent="save">
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Editar Cita</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Paciente</label>
                                <select wire:model="patient_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Médico</label>
                                <select wire:model="doctor_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha</label>
                                <input type="date" wire:model="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora Inicio</label>
                                    <input type="time" wire:model="start_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora Fin</label>
                                    <input type="time" wire:model="end_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Guardar Cambios
                        </button>
                        <button type="button" wire:click="$set('isOpen', false)" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: '¿Eliminar Cita?',
                text: "Escribe el motivo de la cancelación para notificar al paciente:",
                input: 'text',
                inputPlaceholder: 'Ej: El médico tuvo una emergencia...',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar y notificar',
                cancelButtonText: 'Cancelar',
                preConfirm: (value) => {
                    if (!value) {
                        Swal.showValidationMessage('¡Debes proporcionar un motivo!')
                    }
                    return value;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delete', id, result.value);
                }
            })
        }
    </script>
</div>
