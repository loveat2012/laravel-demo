<html>
    <head>
        @section('title', 'Page Title')
        <title>App Name - @yield('title')</title>
    </head>
    <body>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
