<html>
    <head>
        <title>应用程序名称 - @yield('title',"标题默认值")</title>
    </head>
    <body>
        @section('sidebar')
            这是主布局的侧边栏。
        @show



        <hr>

        @component('layouts/alert', ['title' => 'bar'])
   
            <strong>asdfadsf!</strong> Something went wrong!
        @endcomponent

        <hr>


        <div class="container">
            @yield('content', "主要内容区域 默认值")
        </div>

        <hr>

        @section('foot')
            底层
        @show

        <hr>
    </body>
</html> 