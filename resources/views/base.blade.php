<!DOCTYPE html>
<html lang="en">
<head>
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
