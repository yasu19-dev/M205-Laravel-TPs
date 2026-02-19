<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Liste des Emprunts') }}
            </h2>
            <a href="{{ route('emprunts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Nouvel emprunt
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-4 mb-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('emprunts.index') }}" method="GET" class="flex items-end gap-4">
                    <div>
                        <x-input-label for="date_debut" :value="__('Du')" />
                        <x-text-input id="date_debut" name="date_debut" type="date" class="mt-1 block" value="{{ request('date_debut') }}" />
                    </div>
                    <div>
                        <x-input-label for="date_fin" :value="__('Au')" />
                        <x-text-input id="date_fin" name="date_fin" type="date" class="mt-1 block" value="{{ request('date_fin') }}" />
                    </div>
                    <x-primary-button type="submit">{{ __('Filtrer') }}</x-primary-button>
                    <a href="{{ route('emprunts.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Réinitialiser</a>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Livre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auteur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'emprunt</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de retour</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($emprunts as $emprunt)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $emprunt->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $emprunt->livre->titre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $emprunt->livre->auteur->nom }} {{ $emprunt->livre->auteur->prenom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $emprunt->date_emprunt }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($emprunt->date_retour)
                                            <span class="text-green-600">{{ $emprunt->date_retour }}</span>
                                        @else
                                            <span class="text-yellow-600 font-semibold">En cours</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-4">
                                        <a href="{{ route('emprunts.edit', $emprunt) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>

                                        <form action="{{ route('emprunts.destroy', $emprunt) }}" method="POST" onsubmit="return confirm('Supprimer cet emprunt ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
