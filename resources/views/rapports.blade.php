<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @include('includes.head')
    <body class="accueil antialiased selection:text-white">

        @include('includes.menu')

        <div class="relative flex flex-column justify-between min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-main">
        <div>
        <div class="px-6 pt-6 flex justify-between">
        <h1 class="text-white text-h1"><span class="flex gap-4 items-center justify-center"><ion-icon name="albums-outline"></ion-icon>Rapports</span></h1>

        </div>   
            <div class="grid md:grid-cols-2-image gap-6 p-6">
            
                <div class="relative flex-column p-6 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <h1 class="text-h1 mb-4">Nouveau Rapport</h1>
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
                    <form action="{{ route('new-rapport') }}" method="post">
                        @csrf
                            <div class="grid md:grid-cols-2 gap-6 ">
                                <div>
                                    <label for="motif">Motif</label>
                                    <input class="border-1px-solid-white" type="text" id="motif" name="motif" required>
                                    
                                </div>
                                <div class="grid md:grid-cols-2 gap-6 ">
                                        <div>
                                            <label for="medecin">Médecin</label>
                                           <select class="border-1px-solid-white" name="medecin" id="medecin" required>
                                           @foreach ($medecins as $medecin)
                                                <option value="{{ $medecin->id}}">{{ $medecin->nom}} {{ $medecin->prenom}}</option>

                                            @endforeach
                                           </select> 
                                        </div>
                                        <div class="flex gap-4">
                                            <div>
                                            <label for="medicament">Médicament</label>
                                           <select class="border-1px-solid-white" name="medicament" id="medicament" required>
                                           @foreach ($medicaments as $medicament)
                                                <option value="{{ $medicament->id}}" >{{ $medicament->nomCommercial}}</option>
                                            @endforeach
                                           </select> 
                                            </div>
                                           <div>
                                           <label for="quantite">Quantité</label>
                                           <input class="border-1px-solid-white" type="number" min="1" name="quantite" required>
                                           </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="mt-4">
                                    <label for="bilan">Bilan</label>
                                    <textarea class="border-1px-solid-white"  name="bilan" id="bilan" cols="30" rows="10" required></textarea>
                            </div>

                                <button type="submit" class="w-max mt-4" id="submit-btn-mdp">
                                    Créer un nouveau rapport
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