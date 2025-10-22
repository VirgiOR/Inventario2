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



</x-admin-layout>