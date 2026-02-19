<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un nouveau livre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('livres.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="titre" :value="__('Titre du livre')" />
                            <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full" :value="old('titre')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('titre')" />
                        </div>

                        <div>
                            <x-input-label for="annee_publication" :value="__('Année de publication')" />
                            <x-text-input id="annee_publication" name="annee_publication" type="number" class="mt-1 block w-full" :value="old('annee_publication')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('annee_publication')" />
                        </div>

                        <div>
                            <x-input-label for="nombre_pages" :value="__('Nombre de pages')" />
                            <x-text-input id="nombre_pages" name="nombre_pages" type="number" class="mt-1 block w-full" :value="old('nombre_pages')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nombre_pages')" />
                        </div>

                        <div>
                            <x-input-label for="auteur_id" :value="__('Auteur')" />
                            <select id="auteur_id" name="auteur_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                                <option value="">Sélectionnez un auteur</option>
                                @foreach($auteurs as $auteur)
                                    <option value="{{ $auteur->id }}" {{ old('auteur_id') == $auteur->id ? 'selected' : '' }}>
                                        {{ $auteur->nom }} {{ $auteur->prenom }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('auteur_id')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                            <a href="{{ route('livres.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Annuler</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
