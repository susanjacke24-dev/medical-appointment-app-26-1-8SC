<x-admin-layout title="Editar Rol: {{ $role->name }}" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Roles',
        'route' => route('admin.roles.index'),
    ],
    [
        'name' => 'Editar',
    ]
]">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                {{-- Formulario de Edición --}}
                <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- OBLIGATORIO para actualizaciones en Laravel --}}

                    {{-- Campo Nombre del Rol --}}
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre del Rol</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                            placeholder="Ej: Administrador" required>
                        
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sección de Permisos (Lógica central del video 30) --}}
                    <h2 class="mb-4 text-lg font-semibold text-gray-900">Actualizar Permisos</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input id="permission_{{ $permission->id }}" 
                                    name="permissions[]" 
                                    type="checkbox" 
                                    value="{{ $permission->id }}" 
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                    {{-- Esta línea comprueba si el rol ya tiene el permiso para marcar el check --}}
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                
                                <label for="permission_{{ $permission->id }}" class="ml-2 text-sm font-medium text-gray-900">
                                    {{ $permission->description ?? $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    {{-- Botón de Actualizar --}}
                    <div class="mt-8">
                        <button type="submit" 
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 p-2.5 text-center">
                            Actualizar Rol
                        </button>
                        
                        <a href="{{ route('admin.roles.index') }}" class="ml-2 text-gray-700 bg-gray-200 hover:bg-gray-300 font-medium rounded-lg text-sm px-5 p-2.5">
                            Cancelar
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-admin-layout>