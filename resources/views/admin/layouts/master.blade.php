<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
 @include('admin.layouts.partial.styles')
</head>
<body class="sb-nav-fixed">
@include('admin.layouts.partial.header')
<div id="layoutSidenav">

    @include('admin.layouts.partial.sidebar')

    @yield('main-content')
</div>
@include('admin.layouts.partial.scripts')
</body>
</html>
