<nav class="flex flex-row border border-1 justify-between">
    
    

                <div class="flex justify-center items-center px-4 md:px-12" style="font-family:'Lato'; font-size:18px; font-weight:350;">
                        Welcome {{ Auth::user()->surname }} {{ substr(Auth::user()->firstname, 0,1) }}.
                </div>
                <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                </div>
    
</nav>