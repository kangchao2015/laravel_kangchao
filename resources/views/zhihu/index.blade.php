@extends('zhihu.layout.layout')

@section('title', 'live数据检索')



@section('menu')
@parent

@endsection


@section('form')
@parent


<div class="panel panel-primary" style = "margin: 20px">
    <div class="panel-heading">
        <h3 class="panel-title">请筛选你需要的内容</h3>
    </div>
    <div class="panel-body">
    <div>
        <form class="form-inline" role="form" action="/live" method="post">
            {{ csrf_field() }}
            <p>
            <div class="input-group input-group-sm">
              <span class="input-group-addon" id="sizing-addon3">live关键字</span>
              <input type="text" name="name" value="{{$search['name']}}" class="form-control" placeholder="liveName" aria-describedby="sizing-addon3">
            </div>            

            <div class="input-group input-group-sm">
              <span class="input-group-addon" id="sizing-addon3">live作者</span>
              <input type="text"  name="author" value="{{$search['author']}}" class="form-control" placeholder="liveAuthor" aria-describedby="sizing-addon3">
            </div>

            <div class="input-group input-group-sm">
                <span class="input-group-addon" id="sizing-addon3">live分类</span>
                <input type="text"  name="cat" value="{{$search['cat']}}" class="form-control" placeholder="liveCategory" aria-describedby="sizing-addon3">
            </div>

            &nbsp;
            &nbsp;
            &nbsp;
            <div class="input-group input-group-sm">
                <span> <input type="submit" class="form-control" aria-describedby="sizing-addon3"> </span>
            </div>
            </p>
            <p>
<h3>
                最近搜索过的关键词：

                @foreach ($keywords as $k=>$v)
                    <span class="label label-primary">{{$v->subject}}</span>
                @endforeach
            </h3>
            </p>
        </form>
    </div>
    </div>
</div>
<br>


@endsection




@section('data')
@parent
<div class="table-responsive" style = "margin: 10px">
    <span> 共筛选出{{$data['total']}}条数据 </span>
 <table class="table table-striped table-bordered">
   <thead>
     <tr>
       <th>id</th>
       <th>live名称</th>
       <th>live作者</th>
       <th>参加人数</th>
         <th>开始时间</span></th>
       <th>分类</th>
       <th>评分</th>
       <th>官方价格</th>
       <th>操作</th>
     </tr>
   </thead>
   <tbody  id = "action">

    {{-- 此注释将不会出现在渲染后的 HTML --}}
    @foreach ($data['data'] as $k=>$v)
       <tr>
         <td>{{ $v['id'] }}</td>
         <td>{{ $v['subject'] }}</td>
         <td>{{ $v['speaker_member_name'] }}</td>
         <td>{{ $v['seats_taken']}}人</td>
         <td>{{ date('Y/m/d H:i',$v['starts_at'])}} </td>
         <td>{{ $v['tags_0_name'] }}</td>
         <td>{{ $v['feedback_score'] }}</td>
         <td>￥{{ $v['fee_original_price']/100 }}</td>
         <td>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" v-on:click="showdetail('{{ $v['id'] }}')">详情</button>
          <button type="button" class="btn btn-success">选择</button></td>
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

<script type="text/javascript">
  var show_detail = new Vue({
    el: '#action',
    // 在 `methods` 对象中定义方法
    methods: {
      showdetail:function (id) {
        url = "{{ route('showdetail') }}";
        url = url + "/" + id;
        axios.get(url)
          .then(function (response) {
            if(response.data.code == 200){
              data = response.data.data;
              console.log(data);
              $("#myModalLabel").text(data.subject);
              $("#c1").html(data.outline);
              $("#c2").text(data.description);
              $("#c3").text(data.speaker_description);
              $("#c4").text(data.speaker_member_headline);
            }else{

            }
          })
          .catch(function (error) {
            console.log(error);
          });

       }
      }
  })
</script>












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