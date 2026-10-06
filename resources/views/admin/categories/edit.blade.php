<x-app-layout>

    <x-slot name="header">
        <h2>
            Modifier la catégorie
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <form
                method="POST"
                action="{{ route(
                    'admin.categories.update',
                    $category
                ) }}"
            >
                @csrf
                @method('PUT')

                <div>
                    <label for="name">
                        Nom
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old(
                            'name',
                            $category->name
                        ) }}"
                    >

                    @error('name')
                        <div>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="description">
                        Description
                    </label>

                    <textarea
                        name="description"
                        id="description"
                    >{{ old(
                        'description',
                        $category->description
                    ) }}</textarea>

                    @error('description')
                        <div>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit">
                    Mettre à jour
                </button>

            </form>

        </div>
    </div>

</x-app-layout>