@extends('zhihu.layout.layout')

@section('title', '知乎live数据检索')



@section('menu')
@parent
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">菜鸟教程</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">iOS</a></li>
            <li><a href="#">SVN</a></li>
        </ul>
    </div>
    </div>
</nav>
@endsection


@section('form')
@parent


<div class="panel panel-primary" style = "margin: 20px">
    <div class="panel-heading">
        <h3 class="panel-title">请筛选你需要的内容</h3>
    </div>
    <div class="panel-body">
    <div>
        <form class="form-inline" role="form">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <div class="row">

              <div class="form-group col-md-4">
                <label class="sr-only" for="name">名称</label>
                <input type="text" class="form-control" id="name" placeholder="live名称"  style = "width:70%">
              </div>
              <div class="form-group col-md-4">
                <label class="sr-only" for="name">名称</label>
             <select class="form-control" style = "width:70%">
              <option>请选择评原价格范围</option>
              <option>0 - 9.9</option>
              <option>10 - 19.9</option>
              <option>20 - 39.9</option>
              <option>40 - 79.9</option>
              <option>80 - 149.9</option>
              <option>150 - 299.9</option>
              <option>300 - 999.9</option>
            </select>
              </div>
              <div class="form-group col-md-4">
                <label class="sr-only" for="name">名称</label>
            <select class="form-control" style = "width:70%">
              <option>请选择评分范围</option>
              <option>4.2 - 4.5</option>
              <option>5.51 - 4.8</option>
              <option>4.81 - 5</option>
            </select>
              </div>

          </div>
          <br>
          <div class="row">
          <div class="form-group col-md-4">
            <label class="sr-only" for="name">名称</label>
            <select class="form-control" style = "width:70%">
              <option>请选择评分范围</option>
              <option>4.2 - 4.5</option>
              <option>5.51 - 4.8</option>
              <option>4.81 - 5</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label class="sr-only" for="name">名称</label>            
            <select class="form-control" style = "width:70%">
              <option>请选择报名人数范围</option>
              <option>0-100</option>
              <option>100-500</option>
              <option>500-1000</option>
              <option>1000-5000</option>
              <option>5000-10000</option>
              <option>10000以上</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label class="sr-only" for="name">名称</label>
            <select class="form-control" style = "width:70%">
              <option>请选择开始时间范围</option>
              <option>2016/1/1 - 2016/12/31</option>
              <option>2017/1/1 - 2017/06/30</option>
              <option>2017/7/1 - 2017/12/31</option>
              <option>2018/1/1 - 今天</option>
            </select>
          </div>
        </div>
        </form>
    </div>
    </div>
</div>
<br>


@endsection





@section('data')
@parent
<div class="table-responsive">          
 <table class="table table-striped table-bordered">
   <thead>
     <tr>
       <th>id</th>
       <th>live名称</th>
       <th>live作者</th>
       <th>参加人数</th>
       <th>开始时间</th>
       <th>分类</th>
       <th>评分</th>
       <th>官方价格</th>
     </tr>
   </thead>
   <tbody>

    {{-- 此注释将不会出现在渲染后的 HTML --}}
    @foreach ($data['data'] as $k=>$v)
       <tr>
         <td> {{ $v['id'] }}</td>
         <td>{{ $v['subject'] }}</td>
         <td>{{ $v['speaker_member_name'] }}</td>
         <td>{{$v['seats_taken']}}</td>
         <td>{{ date('Y/m/d H:i',$v['starts_at'])}} </td>
         <td>{{ $v['tags_0_name'] }}</td>
         <td>{{ $v['feedback_score'] }}</td>
         <td>￥{{ $v['fee_original_price']/100 }}</td>
       </tr>
    @endforeach

   </tbody>
 </table>
</div>
@endsection



@section('page')
@parent
<ul class="pagination">

    @if($data['current_page'] != 1)
      <li><a href={{$data['prev_page_url']}} >上一页</a></li>
      <li><a href={{$data['path']}}?page=1 >第一页</a></li>
      <li><a>.....</a></li>
      <li class=""><a href={{$data['prev_page_url']}} >{{$data['current_page'] - 1}}</a></li>
    @endif
    @if($data['current_page'] != $data['last_page'])
      <li class="active"><a href="#">{{$data['current_page']}}</a></li>
    @else
      <li class="active"><a href="#">{{$data['current_page']}}(最后一页)</a></li>
    @endif
    @if($data['current_page'] != $data['last_page'])
      <li class=""><a href={{$data['next_page_url']}}>{{$data['current_page'] + 1}}</a></li>
      <li><a>.....</a></li>
      <li><a href={{$data['path']}}?page={{$data['last_page']}} >最后一页({{$data['last_page']}})</a></li>
      <li><a href={{$data['next_page_url']}} >下一页</a></li>
    @endif
    <li><a>      .       </a></li>
    <li><a>当前{{$data['from']}}--{{$data['to']}} / 总计{{$data['total']}}</a></li>
</ul>


@endsection
{{--


@section('test')

  @foreach ($data as $k=>$v)
    @if($k === 'data')
      @continue;
    @endif
      <p>此用户为 {{$k}}   {{$v}}</p>
  @endforeach

@endsection



--}}