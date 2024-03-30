<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ trans('strings.name') }} </title>
</head>

<body class="">
    <div>
        @include('home.home')
    </div>
</body>

</html>
