<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')>
       @include('admin.auth.partial.styles')
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    @yield('auth-content')
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                @include('admin.auth.partial.footer')
            </div>
        </div>
       @include('admin.auth.partial.scripts')
    </body>
</html>
