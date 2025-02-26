<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('url.shortener')" :active="request()->routeIs('url.shortener')">
                        {{ __('URL Shortener') }}
                    </x-nav-link>
                    <x-nav-link :href="route('url.analytics')" :active="request()->routeIs('url.analytics')">
                        {{ __('Analytics') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
