<!DOCTYPE html>
<html class="no-js" lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        <title>@yield('title')</title>
        @stack('before-style')
        @include('includes.style')
        @stack('after-style')

    </head>

    <body>
        @include('includes.header')
        <!-- Content -->
        <main class="main">
        @yield('content')
        </main>
        <!-- End Content -->
        @include('includes.footer')
        @stack('before-script')
        @include('includes.script')
        @stack('after-script')
    </body>
</html>
