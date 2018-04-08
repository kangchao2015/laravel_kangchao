<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/vue.min.js') }}"></script>
    <script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>
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


@section('page')
    <!--paganition-->

@show
    <!--paganition end-->

@section('test')
    <!--test-->
@show
    <!--test end-->



    
@component('zhihu.common.show')
@endcomponent

{{--
@component('zhihu.common.statics')
@endcomponent
--}}



</body>
</html>