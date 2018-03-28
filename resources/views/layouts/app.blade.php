<html>
    <head>
        <title>应用程序名称 - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            这是主布局的侧边栏。
        @show


        @component('layouts/alert', ['title' => 'bar'])
   
            <strong>asdfadsf!</strong> Something went wrong!
        @endcomponent

        <div class="container">
            @yield('content')
        </div>
    </body>
</html> 