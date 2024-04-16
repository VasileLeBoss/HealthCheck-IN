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
            <div class="text-xl font-semibold ">
                <a href="{{ route('mon-compte') }}">
                    Mon Compte
                </a>

            </div>
                <div class="text-xl font-semibold hover:text-red mt-8">
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