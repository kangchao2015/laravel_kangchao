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


@section('page')
    <!--paganition-->

@show
    <!--paganition end-->

@section('test')
    <!--test-->
@show
    <!--test end-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?471c47cdbba90d34c28ed180ba56ebff";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>