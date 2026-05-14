<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Paciente -->
                <div>
                    <label for="patient_id" class="block text-sm font-medium text-gray-700">Paciente</label>
                    <select wire:model="patient_id" id="patient_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Seleccione un paciente</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->user->name ?? 'Paciente sin usuario' }}</option>
                        @endforeach
                    </select>
                    @error('patient_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Doctor -->
                <div>
                    <label for="doctor_id" class="block text-sm font-medium text-gray-700">Doctor</label>
                    <select wire:model="doctor_id" id="doctor_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Seleccione un doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }} {{ $doctor->specialty ? "($doctor->specialty)" : '' }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Fecha -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Fecha</label>
                    <input type="date" wire:model="date" id="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Espaciador (Opcional) -->
                <div></div>

                <!-- Hora Inicio -->
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700">Hora Inicio</label>
                    <input type="time" wire:model="start_time" id="start_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('start_time') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Hora Fin -->
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700">Hora Fin</label>
                    <input type="time" wire:model="end_time" id="end_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('end_time') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Motivo -->
                <div class="md:col-span-2">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Motivo de la Cita</label>
                    <textarea wire:model="reason" id="reason" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Escriba el motivo..."></textarea>
                    @error('reason') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">
                    Registrar Cita
                </button>
            </div>
        </form>
    </div>
</div>
