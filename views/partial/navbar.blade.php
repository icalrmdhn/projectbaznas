<nav class="bg-white border-gray-200 dark:bg-gray-900 fixed h-20 z-50 border-b-2 w-screen">
    <div class="w-full max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 px-20">
        @if (Auth::user()->level == 0)
        <a href="/dashboard" class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" class="h-12 mr-3" alt="Baznas Logo" />
            <p class=" font-bold">Baznas DKI</p>
        </a>
        @else
        <a href="/" class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" class="h-12 mr-3" alt="Baznas Logo" />
            <p class=" font-bold">Baznas DKI</p>
        </a>
        @endif
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
    </div>
    <div class="hidden p-2 px-20 bg-white w-screen mx-auto border-b border-gray-200" id="navbar-default">

        <div class="max-w-screen-xl w-full mx-auto flex flex-col">
            <div class="mt-4 bg-green-500 rounded-md p-4 drop-shadow-lg">
                <p class="text-left font-bold text-sm text-white">
                    Selamat Datang, <span class="font-normal"> {{Auth::user()->level == 0 ? 'Koordinator Survey' : (Auth::user()->level == 1 ? 'Surveyor' : 'Admin')}} - {{ Auth::user()->name }}</span>
                </p>
                
            </div>
            @if (Auth::user()->level == 0)
                <div class="my-6">
                    <nav class=" space-y-6 ">
                        <div id="exit" class="space-y-2 ">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center w-full px-4 py-2 text-black transition-colors duration-300 rounded-lg hover:bg-green-600 hover:text-white">
                            @csrf
                            <button class=" flex items-center w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                                  </svg>
                                  
                                <span class="mx-2 text-sm font-medium">Dashboard</span>
                            </button>
                        </a>
                        <a href="{{ route('home') }}"
                            class="flex items-center w-full px-4 py-2 text-black transition-colors duration-300 rounded-lg hover:bg-green-600 hover:text-white">
                            @csrf
                            <button class=" flex items-center w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                  </svg>
                                  
                                <span class="mx-2 text-sm font-medium">Survey Managemnt</span>
                            </button>
                        </a>
                        <a href="{{ route('user-management') }}"
                            class="flex items-center w-full px-4 py-2 text-black transition-colors duration-300 rounded-lg hover:bg-green-600 hover:text-white">
                            @csrf
                            <button class=" flex items-center w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                  </svg>
                                  
                                <span class="mx-2 text-sm font-medium">User Management</span>
                            </button>
                        </a>
                </div>
                <div class="px-4">
                    <div class="h-0.5 w-full bg-gray-600">
                    
                    </div>
                </div>
            @endif
            @if (Auth::user()->level == 2)
            <div class="my-6">
                <nav class=" space-y-6 ">
                    <div id="exit" class="space-y-2 ">
                   
                    <a href="{{ route('user-management') }}"
                        class="flex items-center w-full px-4 py-2 text-black transition-colors duration-300 rounded-lg hover:bg-green-600 hover:text-white">
                        @csrf
                        <button class=" flex items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                              </svg>
                              
                            <span class="mx-2 text-sm font-medium">User Management</span>
                        </button>
                    </a>
            </div>
            <div class="px-4">
                <div class="h-0.5 w-full bg-gray-600">
                
                </div>
            </div>
            @endif
            <div class="mt-6">
                <nav class=" space-y-6 ">
                    <div id="exit" class="space-y-2 ">
                        <a href="{{ route('user-profile') }}"
                            class="flex items-center w-full px-4 py-2 text-black transition-colors duration-300 rounded-lg hover:bg-green-600 hover:text-white">
                            @csrf
                            <button class=" flex items-center w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                  </svg>
                                  
                                <span class="mx-2 text-sm font-medium">Profile</span>
                            </button>
                        </a>

                        <form action="{{ Route('logout') }}" method="post" 
                            class="flex items-center w-full px-4 py-2 text-black transition-colors duration-300 rounded-lg hover:bg-red-600 hover:text-white">
                            @csrf
                            <button class=" flex items-center w-full">
                                <svg xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                    </path>
                                    <path d="M9 12h12l-3 -3"></path>
                                    <path d="M18 15l3 -3"></path>
                                </svg>
                                <span class="mx-2 text-sm font-medium">Log Out</span>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>

    </div>
</nav>
