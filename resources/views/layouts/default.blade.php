<!DOCTYPE html>
<html>
    <head>
        @include('layouts.header')
    </head>
    <body>
        <div>
            @include('layouts.navbar')
        </div>
        <div class="content">
            @section('content')
            @show
        </div>
        @include('layouts.footer')
    </body>
</html>
