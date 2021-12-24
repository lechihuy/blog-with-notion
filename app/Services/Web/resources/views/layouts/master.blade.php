<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link href="{{ mix('web/css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-50">
    <div class="container px-4 py-10 w-[calc(theme(space.96)*2)] mx-auto max-w-full">
        @include('web::layouts.header')
    
        @yield('content')
    </div>
</body>
</html>