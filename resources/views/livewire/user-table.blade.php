<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Usuarios</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Agregar Usuario</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar usuario o rol..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center">Nombre</th>
                    <th class="py-2 px-4 text-center">Correo</th>
                    <th class="py-2 px-4 text-center">Cargo</th>
                    <th class="py-2 px-4 text-center">Dirección</th>
                    <th class="py-2 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $user->nombres }} {{ $user->apellidos }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $user->email }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $user->role->nombre ?? '-' }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $user->direccion->nombre ?? '-' }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal({{ $user->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $user->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">No se encontraron usuarios.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
    <!-- Modal Crear/Editar Usuario -->
    @if($showModal)
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-lg font-bold mb-4">{{ $isEdit ? 'Editar Usuario' : 'Agregar Usuario' }}</h2>
            <form wire:submit.prevent="saveUser">
                <div class="mb-4">
                    <label class="block text-gray-700">Nombres</label>
                    <input
                        type="text"
                        wire:model="nombres"
                        class="w-full border rounded px-3 py-2 mt-1"
                        pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
                        title="Solo letras y espacios permitidos"
                        maxlength="50"
                        required />
                    @error('nombres') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Apellidos</label>
                    <input
                        type="text"
                        wire:model="apellidos"
                        class="w-full border rounded px-3 py-2 mt-1"
                        pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
                        title="Solo letras y espacios permitidos"
                        maxlength="50"
                        required />
                    @error('apellidos') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Correo</label>
                    <input
                        type="email"
                        wire:model="email"
                        class="w-full border rounded px-3 py-2 mt-1"
                        title="Ingrese un correo electrónico válido (ejemplo@dominio.com)"
                        maxlength="100"
                        required />
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Cargo</label>
                    <select wire:model.defer="role_id" class="w-full border rounded px-3 py-2 mt-1" required>
                        <option value="">Seleccione un cargo</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                        @endforeach
                    </select>
                    @error('role_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Dirección</label>
                    <select wire:model.defer="direccion_id" class="w-full border rounded px-3 py-2 mt-1" required>
                        <option value="">Seleccione una dirección</option>
                        @foreach($direcciones as $direccion)
                        <option value="{{ $direccion->id }}">{{ $direccion->nombre }}</option>
                        @endforeach
                    </select>
                    @error('direccion_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                @if($isEdit)
                <div class="mb-4">
                    <label class="block text-gray-700">Nueva Contraseña</label>
                    <input
                        type="password"
                        wire:model="new_password"
                        class="w-full border rounded px-3 py-2 mt-1"
                        placeholder="Dejar en blanco para no cambiar"
                        minlength="6" />
                    @error('new_password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                @endif
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $isEdit ? 'Actualizar' : 'Crear' }}</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    <!-- Confirm Delete Modal -->
    @if($showDeleteModal)
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-lg font-bold mb-4">Eliminar Usuario</h2>
            <p class="mb-4">¿Está seguro que desea eliminar este usuario?</p>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" wire:click="closeDeleteModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                <button type="button" wire:click="deleteUser" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
            </div>
        </div>
    </div>
    @endif
    <!-- Modal de éxito con Alpine.js -->
    <x-success-modal message="Los cambios se han guardado correctamente." />
</div>