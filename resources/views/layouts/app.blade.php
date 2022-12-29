<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@isset($pageTitle) {{ $pageTitle }} - @endisset {{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <wireui:scripts />
    @livewireStyles

</head>
<body class="antialiased mx-auto overflow-hidden">

<div class="min-h-screen bg-secondary-50">
    <main class="mx-auto member-body-max-width">
        <div class="relative flex">

            <aside class="flex-[0.2] hidden min-h-screen max-h-screen overflow-hidden lg:flex shadow-lg ">
                <livewire:sidebar.sidebar />
            </aside>

            <section class="flex-[0.8]">
                <x-navbar />
                <div class="flex flex-col h-full lg:py-6 py-3 md:px-0 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 ">
                    <div class="flex">
                        <div class="w-full">
                            @if (session('primary'))
                                <div class="flex items-center justify-center text-center p-2">
                                    <x-flash>
                                        {{ session()->pull('primary') }}
                                    </x-flash>
                                </div>
                            @endif

                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>

@stack('modals')

@livewireScripts
@livewire('livewire-ui-modal')

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>

<!----------------Added scripts goes here---------------->
@stack('scripts')
<!----------------./Added scripts goes here---------------->
</body>
</html>
