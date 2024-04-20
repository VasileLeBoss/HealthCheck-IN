<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @include('includes.head')
    <body class="accueil antialiased selection:text-white">

        @include('includes.menu')

        <div class="relative flex flex-column justify-between min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-main">
        <div>
        <div class="px-6 pt-6 flex">

        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Bienvenue, {{ auth()->user()->prenom }}</h2>

        </div>   
            <div class="grid md:grid-cols-2 gap-6 p-6">
            
                <div class=" p-6 flex-column span-2 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div class="flex justify-between">
                    <h1 class="text-h1 mb-4">Médicaments</h1>
                    </div>
                    <div>
                        @if ($medicaments->isEmpty())
                        <h2> Aucun médicament disponible. </h2>
                        <a href="{{ route('creation-rapport') }}" class="text-main-color"><span class="flex items-center"><ion-icon name="add-outline"></ion-icon>Créer un rapport</span></a>
                        @else
                        
                        <table>
                            <tr>
                                <th>Nom</th>
                                <th>Composition</th>
                                <th>Effets</th>
                                <th>Contreindication</th>
                                <th>Famille</th>
                            </tr>
                                @foreach ($medicaments as $medicament)
                                    <tr class="capitalize">
                                        <td>{{ $medicament->nomCommercial }}</td>
                                        <td>{{ $medicament->composition }}</td>
                                        <td>{{ $medicament->effets }}</td>
                                        <td>{{ $medicament->contreindication }}</td>
                                        <td>{{ $medicament->famille->libelle }}</td>
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