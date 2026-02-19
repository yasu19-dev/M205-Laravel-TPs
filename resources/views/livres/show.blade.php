<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmation de suppression') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-50 border border-red-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col items-center text-center">

                    <svg class="w-16 h-16 text-red-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>

                    <h3 class="text-lg font-medium text-gray-900 mb-2">Êtes-vous sûr de vouloir supprimer ce livre ?</h3>
                    <p class="text-gray-600 mb-6">
                        <strong>{{ $livre->titre }}</strong><br>
                        Écrit par : {{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}
                    </p>

                    <form action="{{ route('livres.destroy', $livre) }}" method="POST" class="flex gap-4">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('livres.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Annuler
                        </a>
                        <x-danger-button>
                            {{ __('Oui, supprimer définitivement') }}
                        </x-danger-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
