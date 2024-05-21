
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    
</style>

<div class="min-h-screen bg-gray-100">

    <div  class="sidebar flex h-full md:grid grid-cols-5">

        <div
            class="h-screen h-full overflow-y-auto col-span-1 lg:flex  flex-col lg:w-full w-72 lg:static hidden  absolute top-0 left-0 z-50  bg-[#041643]"
            id="sideBar">
            <div class="w-full flex justify-center relative">
                <img src="{{asset('https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png')}}" alt=""
                     class="h-auto mt-2 w-48">
                <div class="h-max w-max absolute top-2 right-4 lg:hidden  flex">
                    <i class="fa fa-xmark  text-white text-2xl cursor-pointer"
                       onclick="
                        document.getElementById('sideBar').classList.add('hidden');
                     "
                    ></i> 
                </div>
            </div>
            <div class="w-full px-4 ">
                <div class="w-full ">
                    <span class="text-normalText font-normal  text-sm font-montserrat mt-2">MANAGE</span>
                </div>

                <div class="w-full flex flex-col gap-2 mt-2">
                    {{-- @can('view dashboard') --}}
                        <a href="{{route('dashboard')}}"
                           class=" {{Route::currentRouteName()=='dashboard'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-black hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-dashboard mr-2 "></i> Dashboard
                        </a>
                    {{-- @endcan --}}

                   

                    {{-- @can('view flights') --}} 
                        <a href="{{route('flight')}}"
                              class=" {{Route::currentRouteName()=='flight'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-black hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-plane-departure mr-2 "></i> Flights

                        </a>
                    {{-- @endcan --}}
                    
                
                        <a href="{{route('hotel')}}"
                              class=" {{Route::currentRouteName()=='hotel'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-black hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-hotel mr-2 "></i> Hotels

                        </a>
                
                   
                   
                    
                   

                        <a href="{{route('users.index')}}"
                           class=" {{Route::currentRouteName()=='users.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-black hover:bg-white transition ease-in duration-2000">
                            <i class="fa-solid fa-user mr-2 "></i> Users

                        </a>
                 
                    {{-- @can('view roles') --}}

                        <a href="{{route('roles.index')}}"
                           class=" {{Route::currentRouteName()=='roles.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-black hover:bg-white transition ease-in duration-2000">
                            <i class="fa-solid fa-briefcase mr-2 "></i> Roles
                        </a>
                    {{-- @endcan
                    @can('view permissions') --}}

                        <a href="{{route('permissions.index')}}"
                           class=" {{Route::currentRouteName()=='permissions.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-black hover:bg-white transition ease-in duration-2000">
                            <i class="fa-solid fa-screwdriver-wrench mr-2 "></i> Permissions
                        </a>

                    {{-- @endcan --}}
                </div>
            </div>
            {{-- <div class="w-full px-4 mt-16">

                <div class="w-full flex flex-col gap-2 mt-2">
                    @can('view profile')

                        <Link href="{{route('profile.show')}}"
                              class=" {{Route::currentRouteName()=='profile.show'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-gear mr-2 "></i> Settings
                        </Link>
                    @endcan
                </div>

            </div> --}}
           
        </div>


        <!-- Page Heading -->
        <div class="right-area container h-screen overflow-y-scroll overflow-x-auto mx-auto col-span-4 bg-[#F2F7FF]">
            {{--            <i class="fa-solid fa-bars text-3xl block md:hidden" id="toggleSideBar"></i>--}}
            <x-dashboardNavigation/>

            <div class="p-4">
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

            </div>
        </div>
    </div>
</div>




