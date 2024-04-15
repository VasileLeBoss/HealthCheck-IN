<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HealthCheck-IN</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet"/>
        <link rel="stylesheet" href="/css/main.css">
        <!-- Styles -->
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-main selection:text-white">
            <!-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                   <h1 class="logo-large sm:logo-small font-semibold text-gray-900 dark:text-white">HealthCheck-IN</h1>
 
                </div>

                <div class="mt-16 ">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 ">
                        <div class="  p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>

                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Inscription</h2>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mt-4 text-white">
                                        <input
                                            id="nom"
                                            type="text"
                                            placeholder="Nom"
                                            class="w-300px border-1px-solid-white"
                                            name="nom"
                                            value="{{ old('nom') }}"
                                            required="required"
                                            autofocus="autofocus">
                                    </div>
                                    <div class="mt-4 text-white">
                                        <input
                                            id="prenom"
                                            type="text"
                                            placeholder="Prenom"
                                            class="w-300px border-1px-solid-white"
                                            name="prenom"
                                            value="{{ old('prenom') }}"
                                            required="required"
                                            autofocus="autofocus">
                                    </div>
                                    <div class="mt-4 text-white">
                                        <input
                                            id="email"
                                            type="email"
                                            placeholder="Email"
                                            class="w-300px border-1px-solid-white"
                                            name="login"
                                            value="{{ old('login') }}"
                                            required="required"
                                            autofocus="autofocus">
                                    </div>

                                        <div class="mt-4 text-white">
                                            
                                            <input
                                                class="w-300px border-1px-solid-white"
                                                id="password"
                                                placeholder="Mot de passe"
                                                type="password"
                                                name="password"
                                                required="required"
                                                autocomplete="current-password">
                                        </div>
                                        <div class="mt-4 text-white">
                                        <input
                                            id="adresse"
                                            type="text"
                                            placeholder="Adresse"
                                            class="w-300px border-1px-solid-white"
                                            name="adresse"
                                            value="{{ old('adresse') }}"
                                            required="required"
                                            autofocus="autofocus">
                                        </div>
                                        <div class="mt-4 text-white">
                                        <input
                                            id="ville"
                                            type="text"
                                            placeholder="Ville"
                                            class="w-300px border-1px-solid-white"
                                            name="ville"
                                            value="{{ old('ville') }}"
                                            required="required"
                                            autofocus="autofocus">
                                        </div>
                                        

                                        <div class="mt-4 text-white">
                                        <input
                                            id="cp"
                                            type="text"
                                            placeholder="Code Postal"
                                            class="w-300px border-1px-solid-white"
                                            name="cp"
                                            value="{{ old('cp') }}"
                                            required="required"
                                            autofocus="autofocus">
                                        </div>

                                                <div class="mt-4 text-white" >
                                                    <button type="submit  w-max ">
                                                        S'inscrire
                                                    </button>
                                                </div>

                                        <div class="mt-4 text-white">
                                        <a href="{{ route('login') }}" >J'ai déjà un compte </a>
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>