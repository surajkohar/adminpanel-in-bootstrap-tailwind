

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- <div class="w-full flex justify-between shadow-lg  px-4 py-2 sticky top-0 left-0 bg-white z-40">
    <div class="w-max flex items-center">
        <div class="h-max w-max  lg:hidden flex">
            <i class="fa fa-bars  text-themeColor text-2xl mr-3 cursor-pointer"
               onclick="
                        document.getElementById('sideBar').classList.remove('hidden');
                     "></i>
        </div>
        <span class="text-black font-bold text-xl font-montserrat lg:block md:block hidden">Super Admin Dashboard</span>
    </div>
    <div class="w-max relative lg:block md:block hidden">
        <input type="text" name="search"
               class="w-full bg-lightTheme rounded-sm border-[0px] px-12 py-1.5 focus:border-[0px] text-themeColor mt-1 focus:ring-0 focus:outline-none"
               placeholder="Search">
        <i class="fa fa-search  text-themeColor text-xl cursor-pointer absolute left-4 top-2.5"></i>
    </div>
    <div class="w-max flex gap-2 items-center">
        <div class="w-max flex flex-col items-end">
            <span class="text-black font-bold text-sm font-montserrat">{{ auth()->user()->name }}</span>
            <p class="text-normalText font-normal  text-xs font-montserrat  text-center">Admin</p>
        </div>
        <div class="w-max h-max flex ">
            <img src="{{ asset('storage/' . auth()->user()->profile_photo_path)}}" class="rounded-full h-8 w-8" alt="">
        </div>
        <div class="w-48 mt-2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 py-1 bg-white z-40">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>

            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                {{ __('Profile') }}
            </a>

            @if(\Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ __('API Tokens') }}
                </a>
            @endif

            <div class="border-t border-gray-200"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</div> --}}


<div class="w-full flex justify-between shadow-lg px-4 py-2 sticky top-0 left-0 bg-white z-40 h-[10%]">
    <div class="w-max flex items-center">
        <div class="h-max w-max lg:hidden flex">
            <i class="fa fa-bars text-themeColor text-2xl mr-3 cursor-pointer"
                onclick="document.getElementById('sideBar').classList.remove('hidden');"></i>
        </div>
        <span class="text-black font-bold text-xl font-montserrat lg:block md:block hidden">Admin Dashboard</span>
    </div>
   
    <div class="w-max flex gap-2 items-center">
        <div class="w-max flex flex-col items-end cursor-pointer user-section" onclick="toggleDropdown()">
            <span class="text-black font-bold text-sm font-montserrat">{{ auth()->user()->name }}</span>
            <p class="text-normalText font-normal text-xs font-montserrat text-center">{{ auth()->user()->role }}</p>
        </div>
        <div id="profile-dropdown" class="hidden mt-24 absolute right-0  w-48 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 py-1 bg-white z-40">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">{{ __('Manage Account') }}</div>

            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Profile') }}</a>

            @if (\Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('API Tokens') }}</a>
            @endif

            <div class="border-t border-gray-200"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('Log Out') }}</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Toggle dropdown when user clicks on user name or image
        $('.user-section').click(function(event) {
            $('#profile-dropdown').toggleClass('hidden');
            event.stopPropagation(); // Prevent click event from propagating to the document body
        });
    
        // Hide dropdown when user clicks outside
        $(document).click(function() {
            $('#profile-dropdown').addClass('hidden');
        });
    
        // Prevent dropdown from hiding when clicked inside
        $('#profile-dropdown').click(function(event) {
            event.stopPropagation();
        });
    });
    </script>
