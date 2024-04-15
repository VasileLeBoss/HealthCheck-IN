<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HealthCheck-IN</title>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet"/>
        <link rel="stylesheet" href="/css/main.css">
        <!-- Styles -->
    </head>
    <body class="accueil antialiased selection:text-white">

        <div class="menu flex justify-between flex-column text-white bg-dots-darker bg-center bg-gray-100 dark:bg-gray-900 min-h-screen">
            <div>
            <div class="text-main-color mb-8 sm:logo-small">
            <a href="/accueil">HealthCheck-IN</a>
            </div> 
            <div class="text-xl font-semibold">
            <a href="#">Mes Médecin</a>
            </div> 
            
            <div class="text-xl mt-4 font-semibold">
            <a href="">Mes Rapport</a>
            </div> 
            <div class="text-xl mt-4  font-semibold">
            <a href="">Médicaments</a>
            </div> 
            </div>
            <div>
                <div class="text-xl font-semibold hover:text-red">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Se déconnecter
                    </a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>

        <div class="relative flex flex-column justify-between min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-main">
        <div>
        <div class="p-6 flex justify-end">

        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Bienvenue, {{ auth()->user()->prenom }}</h2>

        </div>   
            <div class="grid md:grid-cols-2 gap-6 p-6">
                <a href="" class="overflow-hidden">
                <div class="relative p-6 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <h1 class="text-h1  new-mark">Médicaments</h1>
                </div>
                </a>
                <a href="">
                <div class=" p-6 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <h1 class="text-h1 ">Statistiques</h1>
                </div>
                </a>
                <div class=" p-6 span-2 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <h1 class="text-h1 ">Mes Rapport</h1>
                </div>
                
            </div>
        </div>
        <!-- <div class=" p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">

                        </div> -->
                        @include('includes.footer')

        </div>
        
    </body>
</html>