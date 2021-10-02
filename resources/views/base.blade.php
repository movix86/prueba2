<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name - @yield('title')</title>
    @include('meta-data')

</head>
<body>
    <x-delete-date/>
    <div class="row">
        @section('nav')

        @show
    </div>
    <div class="row">
        @yield('content')
    </div>
    <div class="row">
        @section('footer')

        @show
    </div>


</body>
</html>
