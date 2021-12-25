<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link href="{{ mix('web/css/app.css') }}" rel="stylesheet">
</head>
<body class="text-base bg-slate-50">
    @include('web::layouts.header')

    <div class="{{
        $viewName !== 'web::detail.post'
            ? 'container px-4 w-[calc(theme(space.96)*2)] mx-auto max-w-full'
            : 'container md:px-4 w-[calc(theme(space.96)*2)] mx-auto max-w-full'
    }}">
        @yield('content')
    </div>

    @include('web::layouts.footer')

    <script src="https://code.jquery.com/jquery.min.js"></script>
    @stack('scripts')
</body>
</html>