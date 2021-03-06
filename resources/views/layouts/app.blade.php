<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Workflow</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>


    <body class="font-sans antialiased">
        
        

        <div class="min-h-screen bg-gray-100">
            <!-- Me renderiza lo que tengo en mi navigation-blade -->
            @livewire('navigation')
            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @livewire('footer')
    
        </div>

        @stack('modals')

        @livewireScripts
        
        @yield('js')
        
        
    </body>
</html>
