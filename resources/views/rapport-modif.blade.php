<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @include('includes.head')
    <body class="accueil antialiased selection:text-white">

        @include('includes.menu')

        <div class="relative flex flex-column justify-between min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-main">
        <div>
        <div class="px-6 pt-6 flex justify-between">
        <h1 class="text-white text-h1"><span class="flex gap-4 items-center justify-center"><ion-icon name="albums-outline"></ion-icon>Rapports</span></h1>
        <div class="flex">
        <a href="{{ route('delete-rapport', ['id' => $rapport->id]) }}" class="self-center text-sm font-semibold color-red" data-confirm="Êtes-vous sûr de vouloir supprimer ce rapport?" onclick="event.preventDefault(); document.getElementById('delete-rapport-{{ $rapport->id }}').submit();">Supprimer ce rapport</a>

        <form id="delete-rapport-{{ $rapport->id }}" action="{{ route('delete-rapport', ['id' => $rapport->id]) }}" method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

    </div>
        </div>   
            <div class="grid md:grid-cols-2-image gap-6 p-6">
            
                <div class="relative flex-column p-6 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <h1 class="text-h1 mb-4">Modifier le Rapport</h1>
                    @if (session('success'))
                            <div class="mt-4">
                            <span class="color-green ">{{ session('success') }}</span>
                            </div>
                                
                            @endif
                            @if (session('error'))
                            <div class="mt-4">
                            <span class="color-red ">{{ session('error') }}</span>
                            </div>
                            @endif 
                    <div>
                    <form action="{{ route('update-rapport', ['id' => $rapport->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="motif">Motif</label>
                                <input class="border-1px-solid-white" type="text" id="motif" name="motif" value="{{ $rapport->motif }}" required>
                            </div>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="medecin">Médecin</label>
                                    <input type="text" name="medecin" id="medecin" class="border-1px-solid-white" disabled value="{{ $medecins->nom }} {{ $medecins->prenom }}">
                                </div>
                                <div class="flex gap-4">
                                    <div>
                                        <label for="medicament">Médicament</label>
                                        <input type="text" name="medicament" id="medicament" class="border-1px-solid-white" disabled value="{{ ($medicaments) ? $medicaments->nomCommercial : '' }}">
                                    </div>
                                    <div>
                                        <label for="quantite">Quantité</label>
                                        <input class="border-1px-solid-white" disabled type="number" min="1" name="quantite" value="{{ $rapport->offrir->first()->quantite }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="bilan">Bilan</label>
                            <textarea class="border-1px-solid-white" name="bilan" id="bilan" cols="30" rows="10" required>{{ $rapport->bilan }}</textarea>
                        </div>

                        <button type="submit" class="w-max mt-4" id="submit-btn-mdp">
                            Modifier le rapport
                        </button>

                    </form>

                    </div>
                </div>
                
                
                
            
                
            </div>
        </div>
                        @include('includes.footer')

        </div>
        
    </body>
</html>