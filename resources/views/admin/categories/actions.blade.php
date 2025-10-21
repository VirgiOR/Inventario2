<div class="flex items-center space-x-2">
    <x-wire-button blue xs href="{{ route('admin.categories.edit', $category) }}">
        Editar

    </x-wire-button>

    <form action="{{ route('admin.categories.destroy', $category) }}"
     method="POST"  class="delete-form" >
        @csrf
        @method('DELETE')
        <x-wire-button red xs type="submit">
            Eliminar
        </x-wire-button>
    
</div>