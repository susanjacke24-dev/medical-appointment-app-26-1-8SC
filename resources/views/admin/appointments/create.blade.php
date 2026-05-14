<x-admin-layout>
    <x-slot name="title">Programar Nueva Cita</x-slot>
    
    <x-slot name="action">
        <a href="{{ route('admin.appointments.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded shadow">
            <i class="fas fa-arrow-left mr-2"></i> Volver al listado
        </a>
    </x-slot>

    @livewire('admin.appointment-create')
</x-admin-layout>
