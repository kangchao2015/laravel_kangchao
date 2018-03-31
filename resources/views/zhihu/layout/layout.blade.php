<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>

@section('menu')
    <!--menu-->
@show
    <!--menu end-->


@section('form')
    <!--form-->
@show
    <!--form end-->


@section('data')
    <!--data-->
@show
    <!--data end-->

</body>
</html>