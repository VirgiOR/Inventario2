<x-admin-layout title="Usuarios| Inventario" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <x-slot name="action">
        <x-wire-button green href="{{ route('admin.users.create') }}">
            Nuevo Usuario
        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.users-table')
    @push('js')
        <script>
            forms = document.querySelectorAll('.delete-form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                   Swal.fire({
                        title: "Estas seguro?",
                        text: "No podrás revertir esto!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí, eliminarlo!",
                        cancelButtonText: "Cancelar!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });

                })
            })
        </script>
    @endpush


</x-admin-layout>
