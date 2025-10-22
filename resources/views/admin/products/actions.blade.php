<div class="flex items-center space-x-2">
    <x-wire-button blue xs href="{{ route('admin.products.edit', $product) }}">
        Editar

    </x-wire-button>

    <form action="{{ route('admin.products.destroy', $product) }}"
     method="POST"  class="delete-form" >
        @csrf
        @method('DELETE')
        <x-wire-button red xs type="submit">
            Eliminar
        </x-wire-button>
    
</div>