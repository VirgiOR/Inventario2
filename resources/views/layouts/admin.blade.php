@php
    $links = 
    [
                [
                    'name' =>'Dashboard',
                    'icon' =>'fa-solid fa-gauge',
                    'href' => route('admin.dashboard'),
                    'active' => request()->routeIs('admin.dasboard'),
                    
                ],


    

                [
                    'header' => 'Administrar página',
                ],

                [
                        'name' =>'Dashboard',
                        'icon' =>'fa-solid fa-gauge',
                        'href' => route('admin.dashboard'),
                        'active' => false,
                ],
                        
                           
                 [      'name' =>'Categorías',
                        'icon' =>'fa-solid fa-list',
                        'href' => route('admin.categories.index'),
                        'active' => request()->routeIs('admin.categories.*'),

                       
                            


                ],

                [
                     'name' =>'Productos ',
                        'icon' =>'fa-solid fa-box',
                        'href' => route('admin.products.index'),
                        'active' => request()->routeIs('admin.products.*'),
                ],

];
       

   
@endphp


@props([
    'title' => config('app.name', 'Laravel'),
    'breadcrumbs' => []
])


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{--SweetAlert2--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    {{--FontAwesome--}}
    <script src="https://kit.fontawesome.com/bf9645e14f.js" crossorigin="anonymous"></script>
     
      
    
    {{--wireUI--}}
    <wireui:scripts />


     <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <!-- Styles -->
    @livewireStyles
    @stack('css')
</head>

<body class="font-sans antialiased bg-gray-50">

    

     <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/" class="flex ms-2 md:me-24">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
                    </a>
                </div>
                <div class="flex items-center">
                     <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                </div>
            </div>
        </div>
    </nav>

     <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">

                @foreach ($links as $link)
                    
                
                <li>
                                @isset($link['header'])

                                        <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">
                                            {{$link['header']}}

                                        </div>
                                @else
                                    @isset($link['submenu'])

                                            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                                <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                                                </svg>
                                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{$link['name']}}</span>
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                                </svg>
                                            </button>
                                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                            @foreach ($link['submenu'] as $item)
                                                
                                                
                                                <li>
                                                    <a href="{{$item['href']}}" 
                                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{$item['name']}}</a>
                                                </li>
                                            @endforeach
                                          
                                        </ul>


                                    @else 
                                        <a href="{{ $link['href']}}"
                                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{$link['active'] ? 'bg-100':''}}">
                                            <span class="inline-flex justify-center items-center text-gray-500">
                                                <i class="{{$link['icon']}}"></i>
                                            </span>
                                            <span class="ms-3">{{$link['name']}}</span>
                                        </a>
                                    @endisset  
                                
                                        
                                    
                                    
                                @endisset
                            </li>
                        @endforeach


                <li>
                
                </li>
                        
                
                
                
                
                
            </ul>
        </div>
    </aside>

      {{--@include('layouts.includes.admin.navigation');  

     {{-- @include('layouts.includes.admin.sidebar');--}} 
     

   

    <div class="p-4 sm:ml-64">

      <div class="mt-14 flex items-center">
        
          @include('layouts.includes.admin.breadcrumb')

           @isset($action)
            <div class="ml-auto">
                {{$action}}

            </div>
           
               
           @endisset

       </div>
           {{ $slot}} 
    
    </div>





    @stack('modals')

    @livewireScripts
    

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @if (session('swal'))
         <script>
                Swal.fire(@json(session('swal')));
          </script>

        @endif

        @stack('js')
</body>

</html>
