<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un nouvel emprunt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('emprunts.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="livre_id" :value="__('Livre emprunté')" />
                            <select id="livre_id" name="livre_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                                <option value="">Sélectionnez un livre</option>
                                @foreach($livres as $livre)
                                    <option value="{{ $livre->id }}" {{ old('livre_id') == $livre->id ? 'selected' : '' }}>
                                        {{ $livre->titre }} (par {{ $livre->auteur->nom }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('livre_id')" />
                        </div>

                        <div>
                            <x-input-label for="date_emprunt" :value="__('Date d\'emprunt')" />
                            <x-text-input id="date_emprunt" name="date_emprunt" type="date" class="mt-1 block w-full" :value="old('date_emprunt', date('Y-m-d'))" required />
                            <x-input-error class="mt-2" :messages="$errors->get('date_emprunt')" />
                        </div>

                        <div>
                            <x-input-label for="date_retour" :value="__('Date de retour (laisser vide si non retourné)')" />
                            <x-text-input id="date_retour" name="date_retour" type="date" class="mt-1 block w-full" :value="old('date_retour')" />
                            <x-input-error class="mt-2" :messages="$errors->get('date_retour')" />
                        </div>

                        <div class="flex items-center gap-4 mt-6">
                            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                            <a href="{{ route('emprunts.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Annuler</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
