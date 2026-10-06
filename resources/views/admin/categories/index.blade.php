<x-app-layout>

    <x-slot name="header">
        <h2>
            Gestion des catégories
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div>
                {{ session('error') }}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('admin.categories.create') }}">
                Ajouter une catégorie
            </a>

            <hr>

            @foreach ($categories as $category)

                <div>
                    <strong>
                        {{ $category->name }}
                    </strong>

                    <p>
                        {{ $category->description }}
                    </p>

                    <a
                        href="{{ route('admin.categories.edit', $category) }}"
                    >
                        Modifier
                    </a>

                    <form
                        method="POST"
                        action="{{ route(
                            'admin.categories.destroy',
                            $category
                        ) }}"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Supprimer
                        </button>
                    </form>
                </div>

            @endforeach

        </div>
    </div>

</x-app-layout>