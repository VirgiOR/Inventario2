<x-admin-layout
title="Productos | Inventario" 
:breadcrumbs="[
    [
        'name'=>'Dashboard',
        'href'=>route('admin.dashboard'),
    ],
    [
        'name'=>'Productos',
        'href'=>route('admin.products.index'),
    ],
    [
        'name'=>'Editar',
    ]
    
  ]">

    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        
    @endpush

    <div class="mb-4">
        <form action="{{ route('admin.products.dropzone', $product) }}" class="dropzone" id="my-dropzone" method="POST" >
            @csrf
        </form>
    </div>


    <x-wire-card>


        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <x-wire-input
             label="Nombre"
             name="name"
             type="text"
             placeholder="Nombre de la productos"
             value="{{ old('name', $product->name) }}"
            />

            <x-wire-textarea
              label="Descripción" name="description" placeholder="Descripción del producto"
              value="{{ old('description', $product->description) }}"
           />
           <x-wire-native-select label="Categoría"  name="category_id">
            <option value="" disabled selected>Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
           </x-wire-native-select>


            <x-wire-input
             label="Precio"
             name="price"
             type="number"
             placeholder="Precio del producto"
             value="{{ old('price', $product->price) }}"
            />

       


            <div class="flex justify-end">
                <x-button type="submit">
                    Actualizar
                </x-button>
            </div>

        </form>

    </x-wire-card>



        
        @push('js')
            <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
            <script>
                    // Note that the name "myDropzone" is the camelized
                    // id of the form.
                Dropzone.options.myDropzone = {
                         // Configuration options go here

                            
                        
                        addRemoveLinks: true,
                        init: function() {
                                let myDropzone = this;
                                let images = @json($product->images);

                                images.forEach(function(image) {
                                    let mockFile = { 
                                        id: image.id,
                                        name: image.path.split('/').pop(),
                                        size: image.size,
                                    }

                                    myDropzone.displayExistingFile(mockFile, `{{ Storage::url('${image.path}') }}`);
                                    myDropzone.emit("complete", mockFile);
                                    myDropzone.files.push(mockFile);

                               });
                               
                               this.on("success", function(file, response) {
                                    file.id = response.id;
                               });


                               this.on("removedfile", function(file) {
                                    if (file.id) {
                                        axios.delete(`/admin/image/${file.id}`)
                                        .then(response => {
                                            console.log(response);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                    }
                               });
                        }
                };
            </script>
        @endpush

     



</x-admin-layout>