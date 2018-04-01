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
<div>
    <form class="form-inline" role="form">
      &nbsp;&nbsp;&nbsp;&nbsp;
      <div class="form-group">
        <label class="sr-only" for="name">名称</label>
        <input type="text" class="form-control" id="name" placeholder="live名称">
      </div>
      <div class="form-group">
        <label class="sr-only" for="name">名称</label>
        <input type="text" class="form-control" id="name" placeholder="原价格">
      </div>
      <div class="form-group">
        <label class="sr-only" for="name">名称</label>
        <input type="text" class="form-control" id="name" placeholder="分类">
      </div>
      <div class="form-group">
        <label class="sr-only" for="name">名称</label>
        <input type="text" class="form-control" id="name" placeholder="评分">
      </div>
      <div class="form-group">
        <label class="sr-only" for="name">名称</label>
        <input type="text" class="form-control" id="name" placeholder="报名人数">
      </div>
      <div class="form-group">
        <label class="sr-only" for="name">名称</label>
        <input type="text" class="form-control" id="name" placeholder="开始时间">
      </div>
    </form>
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



@section('test')

  @foreach ($data as $k=>$v)
    @if($k === 'data')
      @continue;
    @endif
      <p>此用户为 {{$k}}   {{$v}}</p>
  @endforeach

@endsection
