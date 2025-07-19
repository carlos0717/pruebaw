<div>
    <form wire:submit.prevent="{{ $documentoId ? 'update' : 'create' }}">
        <div class="mb-4">
            <label class="block">Título</label>
            <input type="text" wire:model.defer="titulo" class="input input-bordered w-full" required />
            @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block">Categoría</label>
            <select wire:model.defer="categoria_id" class="input input-bordered w-full" required>
                <option value="">Seleccione</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                @endforeach
            </select>
            @error('categoria_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block">Formato</label>
            <input type="text" wire:model.defer="formato" class="input input-bordered w-full" required />
            @error('formato') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block">Tamaño (MB)</label>
            <input type="number" step="0.01" wire:model.defer="tamano_mb" class="input input-bordered w-full" required />
            @error('tamano_mb') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end">
            <button type="button" wire:click="$emitUp('closeModal')" class="btn btn-secondary mr-2">Cancelar</button>
            <button type="submit" class="btn btn-primary">{{ $documentoId ? 'Actualizar' : 'Crear' }}</button>
        </div>
    </form>
</div>
