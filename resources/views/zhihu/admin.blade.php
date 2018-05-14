@extends('zhihu.layout.layout')

@section('title', '管理员登陆')



@section('menu')
@parent

@endsection






@section('form')

    @parent


    @if( isset($uname) && $uname)
    @else
    <div style = "border:1px solid #333; margin:0 auto; width:400px; height:200px;";>
        <form class="form-inline" role="form" action="/auth/login" method="post" >
            <div style="margin:0 auto">
                {{ csrf_field() }}

                <p>
                <div class="input-group input-group-sm" style="margin-left: 20px">
                    <span class="input-group-addon" id="sizing-addon3">用户名</span>
                    <input type="text"  name="uname" value="" class="form-control" placeholder="userName" aria-describedby="sizing-addon3">
                </div>
                 </p>


                <p>
                <div class="input-group input-group-sm"  style="margin-left: 20px">
                    <span class="input-group-addon" id="sizing-addon3">密__码</span>
                    <input type="text"  name="pwd" value="" class="form-control" placeholder="passWord" aria-describedby="sizing-addon3">
                </div>
                </p>
                &nbsp;
                &nbsp;
                &nbsp;
                <div class="input-group input-group-sm">
                    <span> <input type="submit" class="form-control" aria-describedby="sizing-addon3" value="登陆"> </span>
                </div>
            </div>

        </form>
    </div>

    @endif


@endsection