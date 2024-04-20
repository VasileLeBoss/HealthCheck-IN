<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')

    <body class="accueil antialiased selection:text-white">

        @include('includes.menu')

        <div
            class="relative flex flex-column justify-between min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-main">
            <div>
                <div class="p-6 flex justify-between">

                    <div>
                        <h2 class="sm:logo-small font-semibold text-gray-900 dark:text-white">Mon Compte</h2>
                    </div>
                    <div class="flex ">
                    <a href="{{ route('desactiver-compte', ['id' => auth()->user()->id]) }}" class="self-center text-sm font-semibold color-red" onclick="return confirm('Êtes-vous sûr de vouloir désactiver votre compte?')">Désactiver mon compte</a>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-6 p-6">

                    <div class="relative flex-column p-6 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="mb-8">
                            <h1 class="text-h1 text-main-color">Informations Personnelles</h1>
                            @if (session('success'))
                            <div class="mt-4">
                            <span class="color-green ">{{ session('success') }}</span>
                            </div>
                                
                            @endif
                            @if (session('error'))
                            <div class="mt-4">
                            <span class="color-red">{{ session('error') }}</span>
                            </div>
                            @endif
                        </div>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nom">Nom</label>
                                    <input class="border-1px-solid-white" type="text" id="nom" name="nom" value="{{ auth()->user()->nom }}" required>
                                </div>
                                <div>
                                    <label for="prenom">Prenom</label>
                                    <input class="border-1px-solid-white" type="text" id="prenom" name="prenom" value="{{ auth()->user()->prenom }}" required>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="login">Email</label>
                                <input class="border-1px-solid-white" type="email" id="login" name="login" value="{{ auth()->user()->login }}" required>
                            </div>
                            <div class="mt-4 grid gap-6 grid-adress">
                                <div>
                                    <label for="adresse">Adresse</label>
                                    <input class="border-1px-solid-white" type="adresse" id="adresse" name="adresse" value="{{ auth()->user()->adresse }}" required>
                                </div>
                                <div>
                                    <label for="ville">Ville</label>
                                    <input class="border-1px-solid-white" type="ville" id="ville" name="ville" value="{{ auth()->user()->ville }}" required>
                                </div>
                                <div>
                                    <label for="cp">Code Postal</label>
                                    <input class="border-1px-solid-white" type="cp" id="cp" name="cp" value="{{ auth()->user()->cp }}" required>
                                </div>
                            </div>
                            <div class="mt-4 text-white">



                                <button type="submit" class="w-max" id="submit-btn">
                                    Enregistrer
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="relative flex-column p-6 text-white min-h-300px bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div class="mb-8">
                            <h1 class="text-h1 text-main-color">Mot de passe</h1>
                            @if (session('success-mdp'))
                            <div class="mt-4">
                            <span class="color-green ">{{ session('success-mdp') }}</span>
                            </div>
                                
                            @endif
                            @if (session('error-mdp'))
                            <div class="mt-4">
                            <span class="color-red">{{ session('error-mdp') }}</span>
                            </div>
                            @endif
                        </div>
                    <form action="{{ route('profile.update.mdp') }}" method="POST">
                            @csrf
                            
                                <div>
                                    <label for="old-password">Ancien mot de passe</label>
                                    <input class="border-1px-solid-white" type="password" id="old-password" name="old-password" required>
                                </div>
                            
                            <div class="mt-4">
                                <label for="new-password">Nouveau mot de passe</label>
                                <input class="border-1px-solid-white" type="password" id="new-password" name="new-password" required>
                            </div >
                                <div class="mt-4">
                                    <label for="confirm-password">Confirmer le mot de passe</label>
                                    <input class="border-1px-solid-white" type="password" id="confirm-password" name="confirm-password" required>
                                </div>
                            
                            <div class="mt-4 text-white">

                                <button type="submit" class="w-max" id="submit-btn-mdp">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- <div class=" p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl
            from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5
            rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex transition-all
            duration-250 focus:outline focus:outline-2 focus:outline-red-500"> </div> -->
            @include('includes.footer')

        </div>
    
    </body>
    
</html>