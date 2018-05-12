<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/vue.min.js') }}"></script>
    <script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

@section('menu')
    <!--menu-->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">你的剑就是我的剑</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    @if($type =="live")
                        <li class="active"><a href="/live">LIVE</a></li>
                    @else
                        <li class=""><a href="/live">LIVE</a></li>
                    @endif

                    @if($type == "sijiake")
                        <li class="active"><a href="/sijiake">私家课</a></li>
                    @else
                        <li class=""><a href="/sijiake">私家课</a></li>
                    @endif

                    @if($type == "admin")
                        <li class="active"><a href="/admin">管理员登陆</a></li>
                    @else
                        <li class=""><a href="/admin">管理员登陆1</a></li>
                    @endif



                </ul>
            </div>
        </div>
    </nav>
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