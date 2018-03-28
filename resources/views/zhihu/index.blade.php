<!DOCTYPE html>
<html>
<head>
	<title>asdfasdf</title>
	<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>

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

<div class="table-responsive">          
 <table class="table table-striped table-bordered">
   <thead>
     <tr>
       <th>id</th>
       <th>live名称</th>
       <th>live作者</th>
       <th>作者介绍</th>
       <th>开始时间</th>
       <th>分类</th>
       <th>评分</th>
       <th>官方价格</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <td>1</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Broome Street</td>
     </tr>
     <tr>
       <td>1</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Broome Street</td>
     </tr>
     <tr>
       <td>1</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Anna Awesome</td>
       <td>Broome Street</td>
       <td>Broome Street</td>
     </tr>
   </tbody>
 </table>
</div>

</body>
</html>