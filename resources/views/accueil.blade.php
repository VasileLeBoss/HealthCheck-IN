<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @include('includes.head')
    <body class="accueil antialiased selection:text-white">

        @include('includes.menu')

        <div class="relative flex flex-column justify-between min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-main">
        <div>
        <div class="p-6 flex justify-end">

        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Bienvenue, {{ auth()->user()->prenom }}</h2>

        </div>   
            <div class="grid md:grid-cols-2-image gap-6 p-6">
                <a href="" class="overflow-hidden">
                <div class="relative flex-column p-6 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <h1 class="text-h1 mb-4 new-mark">Médicaments</h1>
                    <div>
                        <table>
                            <tr>
                                <th>Nom</th>
                                <th>Composition</th>
                                <th>Effets</th>
                                <th>Contre-indications</th>
                            </tr>

                            @foreach($medicaments as $medicament)
                            <tr>
                                <td>{{ $medicament->nomCommercial }}</td>
                                <td>{{ $medicament->composition }}</td>
                                <td>{{ $medicament->effets }}</td>
                                <td>{{ $medicament->contreindication }}</td>
                                
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                </a>
                
                
                    <img class="self-center self-align rotate w-250px inver-color no-select" src="/src/Caduceus.png" alt="logo">
                
                
                <div class=" p-6 flex-column span-2 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div class="flex justify-between">
                    <h1 class="text-h1 mb-4">Mes Rapport</h1>
                        @if (!$rapports->isEmpty())
                        <h2>
                            <a href="" ><span class="flex items-center"><ion-icon name="add-outline"></ion-icon>Nouveau Rapport</span></a>
                        </h2>
                        @endif
                    </div>
                    <div>
                        @if ($rapports->isEmpty())
                        <h2> Vous n'avez pas encore des rapports</h2>
                        <a href="{{ route('creation-rapport') }}" class="text-main-color"><span class="flex items-center"><ion-icon name="add-outline"></ion-icon>Créer un rapport</span></a>
                        @else
                        <table>
                            <tr>
                                <th>Date</th>
                                <th>Médecin</th>
                                <th>Motif</th>
                                <th>Bilan</th>
                                
                            </tr>

                                @foreach ($rapports as $rapport)
                                    <tr>
                                        <td>{{ $rapport->date }}</td>
                                        <td>{{ $rapport->idMedecin }}</td>
                                        <td>{{ $rapport->motif }}</td>
                                        <td>{{ $rapport->bilan }}</td>
                                        
                                    </tr>
                                @endforeach
                            

                        </table>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
        <!-- <div class=" p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">

                        </div> -->
                        @include('includes.footer')

        </div>
        
    </body>
</html>