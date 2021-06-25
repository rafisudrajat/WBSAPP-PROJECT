<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{$title}}</title>
</head>

<body class="flex items-center justify-center h-screen bg-red-700">
    @yield('content')
</body>

</html>