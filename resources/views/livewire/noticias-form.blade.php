@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 400px;
            border-radius: 0 0 8px 8px;
            padding: 20px;
        }
        .ck.ck-toolbar {
            border-radius: 8px 8px 0 0;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
        }
    </style>
@endpush

@push('scripts')
    <!-- CDN con CKEditor 5 completo y gratuito -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/ckeditor5-full-free-plugin@23.1.2/build/ckeditor.min.js"></script> -->
    <!-- CKEditor 5 Full Free local -->
    <script src="{{ asset('ckeditor5-full/build/ckeditor.min.js') }}"></script>
    
    <script>
        document.addEventListener('livewire:init', async function () {
            console.log('livewire:init event fired');
            
            if (window.editorInstance) return;
            
            const textarea = document.querySelector('#content');
            if (!textarea) {
                console.error('No se encontró el textarea #content');
                return;
            }

            try {
                // Configuración completa con todos los plugins gratuitos
                window.editorInstance = await ClassicEditor.create(textarea, {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                            'bold', 'italic', 'underline', 'strikethrough', '|',
                            'alignment', '|',
                            'link', 'imageUpload', 'mediaEmbed', 'insertTable', 'blockQuote', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'code', 'codeBlock', 'htmlEmbed', '|',
                            'horizontalLine', 'pageBreak', '|',
                            'sourceEditing', '|',
                            'undo', 'redo'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    language: 'es',
                    placeholder: 'Escribe el contenido aquí...',
                    
                    // Configuración avanzada de imágenes
                    image: {
                        toolbar: [
                            'imageTextAlternative', 
                            'imageStyle:inline', 
                            'imageStyle:block', 
                            'imageStyle:side',
                            'toggleImageCaption',
                            'imageResize:25',
                            'imageResize:50',
                            'imageResize:75',
                            'imageResize:100'
                        ],
                        resizeOptions: [
                            {
                                name: 'resizeImage:original',
                                value: null,
                                icon: 'original'
                            },
                            {
                                name: 'resizeImage:25',
                                value: '25',
                                icon: 'small'
                            },
                            {
                                name: 'resizeImage:50',
                                value: '50',
                                icon: 'medium'
                            },
                            {
                                name: 'resizeImage:75',
                                value: '75',
                                icon: 'large'
                            }
                        ],
                        styles: [
                            'full',
                            'side',
                            'alignLeft', 
                            'alignCenter', 
                            'alignRight'
                        ]
                    },
                    
                    // Configuración de subida de imágenes
                    simpleUpload: {
                        uploadUrl: "{{ route('ckeditor.upload') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    },
                    removePlugins: ['CKFinderUploadAdapter'],
                    
                    // Plugins adicionales
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells',
                            'tableProperties',
                            'tableCellProperties'
                        ]
                    },
                    codeBlock: {
                        languages: [
                            { language: 'html', label: 'HTML' },
                            { language: 'css', label: 'CSS' },
                            { language: 'javascript', label: 'JavaScript' },
                            { language: 'php', label: 'PHP' }
                        ]
                    }
                });
                
                console.log('CKEditor 5 Full Free inicializado');
                
                // Sincronización con Livewire
                window.editorInstance.model.document.on('change:data', () => {
                    Livewire.find('{{ $this->getId() }}').set('descripcion', window.editorInstance.getData());
                });

                Livewire.hook('message.processed', (message, component) => {
                    const livewireInstance = Livewire.find('{{ $this->getId() }}');
                    if (window.editorInstance && livewireInstance.get('descripcion') !== window.editorInstance.getData()) {
                        window.editorInstance.setData(livewireInstance.get('descripcion') || '');
                    }
                });
                
                // Manejar carga inicial de datos
                window.editorInstance.setData(textarea.value || '');
                
            } catch (error) {
                console.error('Error al inicializar CKEditor 5 Full Free:', error);
            }
        });
    </script>
@endpush

<div class="min-h-screen bg-gray-100 py-8">
    <div class="w-full max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">{{ $modo === 'create' ? 'Nueva Noticia' : 'Editar Noticia' }}</h1>
        <form wire:submit.prevent="save" class="space-y-8">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Título</label>
                <input type="text" wire:model.defer="titulo" maxlength="255" class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg @error('titulo') border-red-500 @enderror" placeholder="Ej: Campaña de Salud" />
                @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Miniatura (JPG, PNG, WEBP, máx. 5MB)</label>
                <input type="file" wire:model="imagen_upload" accept="image/jpeg,image/png,image/webp" class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg @error('imagen_upload') border-red-500 @enderror" />
                @php
                    $hasImagenUpload = isset($imagen_upload) || (property_exists($this, 'imagen_upload') && $imagen_upload);
                    $hasImagenPath = isset($imagen_path) || (property_exists($this, 'imagen_path') && $imagen_path);
                @endphp
                @if($hasImagenUpload)
                    <div class="mt-2">
                        <span class="block text-gray-600 text-xs mb-1">Vista previa:</span>
                        <img src="{{ $imagen_upload->temporaryUrl() }}" class="h-20 w-auto rounded shadow border" />
                    </div>
                @elseif($hasImagenPath)
                    <div class="mt-2">
                        <span class="block text-gray-600 text-xs mb-1">Miniatura actual:</span>
                        <img src="{{ Storage::url($imagen_path) }}" class="h-20 w-auto rounded shadow border" />
                    </div>
                @endif
                @error('imagen_upload') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div wire:ignore>
                <label class="block text-gray-700 font-semibold mb-1">Contenido</label>
                <div id="editor-container">
                    <textarea name="content" id="content" cols="30" rows="10" 
                              wire:model.defer="descripcion" maxlength="5000" class="form-control @error('descripcion') border-red-500 @enderror" 
                              placeholder="Escribe su contenido">{{ $descripcion }}</textarea>
                </div>
                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Área de Origen</label>
                <select wire:model.defer="area_origen" class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg @error('area_origen') border-red-500 @enderror">
                    <option value="">Seleccione...</option>
                    <option value="RSU">RSU</option>
                    <option value="Seguimiento al Egresado">Seguimiento al Egresado</option>
                    <option value="Proyeccion Social">Proyección Social</option>
                    <option value="Extension Universitaria">Extensión Universitaria</option>
                </select>
                @error('area_origen') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-between gap-2 pt-4">
                <a href="{{ route('noticias') }}" class="bg-gray-300 px-6 py-2 rounded text-lg">Volver al listado</a>
                <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded text-lg hover:bg-blue-700">{{ $modo === 'create' ? 'Crear' : 'Actualizar' }}</button>
            </div>
        </form>
    </div>
    <!-- Modal de éxito profesional (solo si hay mensaje en sesión) -->
    @if(session('success_message'))
        <x-success-modal :message="session('success_message')" />
    @endif
</div>
