<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('getEventFilmIndex')" :active="request()->routeIs('getEventFilmIndex')">
                        {{ __('Events en Films') }}
                    </x-nav-link>
                    <x-nav-link :href="route('getRestaurantIndex')" :active="request()->routeIs('getRestaurantIndex')">
                        {{ __('Restaurants') }}
                    </x-nav-link>
                    <x-nav-link :href="route('getEventIndex')" :active="request()->routeIs('getEventIndex')">
                        {{ __('Events') }}
                    </x-nav-link>
                    <x-nav-link :href="route('getFilmIndex')" :active="request()->routeIs('getFilmIndex')">
                        {{ __('Films') }}
                    </x-nav-link>
                    @auth
                        <x-nav-link :href="route('getReservationIndex')" :active="request()->routeIs('getReservationIndex')">
                            {{ __('Event Reserveringen') }}
                        </x-nav-link>
                        <x-nav-link :href="route('getEventAdminIndex')" :active="request()->routeIs('getEventAdminIndex')">
                            {{ __('Event beheer') }}
                        </x-nav-link>
                        <x-nav-link :href="route('getFilmAdminIndex')" :active="request()->routeIs('getFilmAdminIndex')">
                            {{ __('Film beheer') }}
                        </x-nav-link>
                        <x-nav-link :href="route('getRestaurantAdminIndex')" :active="request()->routeIs('getRestaurantAdminIndex')">
                            {{ __('Restaurant beheer') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            @auth()
                <div class="hidden sm:flex sm:items-center sm:ml-6">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         class="btn"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log uit') }}
                        </x-dropdown-link>
                    </form>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <form method="GET" action="{{ route('login') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         class="btn"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log in') }}
                        </x-dropdown-link>
                    </form>
                </div>
        @endauth

        <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>

                @auth()
                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
