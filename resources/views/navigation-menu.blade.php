<nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100 text-2xl">
    <div id="nav-left" class="flex items-center ">
        <a href="{{ route('home') }}" :active="request()->routeIs('home')" class="flex items-center font-semibold rounded-tl-3xl" >
            &nbsp;&nbsp;<img src="{{ asset('images/TBI_logo.jpg') }}" alt="Icon" class="w-16 h-auto rounded-full">
            <h1 class="h-16 flex items-center text-blue-950" >&nbsp;TBI</h1>&nbsp;Activities&nbsp;
        </a>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                     <span class="text-lg">{{ __('Latest') }}</span>
                </x-nav-link>
            </div>
        </div>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    <span class="text-lg">{{ __('Other Activities') }}</span>
                </x-nav-link>
            </div>
        </div>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link href="{{ route('posts.report') }}" :active="request()->routeIs('posts.report')">
                    <span class="text-lg">{{ __('Generate Report') }}</span>
                </x-nav-link>
            </div>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6">
        @auth()
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
    </div>
</nav>
