<x-admin-layout
title="Categorías | Inventario" 
:breadcrumbs="[
    [
        'name'=>'Dashboard',
        'href'=>route('admin.dashboard'),
    ],
    [
        'name'=>'Categorías',
        'href'=>route('admin.categories.index'),
    ],
    [
        'name'=>'Editar',
    ]
    
  ]">
   <x-wire-card>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <x-wire-input 
            label="Nombre" 
            name="name" 
            type="text" 
            placeholder="Nombre de la categoría" 
            value="{{old('name',$category->name)}}"
            required
        />
        <x-wire-textarea 
            label="Descripción" 
            name="description" 
            placeholder="Descripción de la categoría" 
            value="{{old('description',$category->description)}}"
           
        />
        <div class="flex justify-end">
            <x-button type="submit" >
                Actualizar 
            </x-button>
        </div>

    </form>

  </x-wire-card>



</x-admin-layout>