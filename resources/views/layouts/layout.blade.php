<!doctype html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{mix('css/tailwind.css')}}">
</head>
<body class="bg-gray-300 h-screen">
    <nav class="flex items-stretch bg-gray-800 w-full h-12 mx-auto shadow-lg">
        <div class="flex-auto"></div>
        <div class="flex-auto text-center content-center px-2 py-3">
            <a href="{{url('/')}}">LOGO</a>
        </div>
        <div class="flex-auto text-center px-2">
            <ul class="flex items-stretch">
                <li class="text-center py-3 px-4 text-gray-400 hover:text-white">
                    <a href="{{url('./boards/board')}}">자유게시판</a></li>
                <li class="text-center py-3 px-4 text-gray-400 hover:text-white">
                    <a href="#">자유게시판</a></li>
                <li class="text-center py-3 px-4 text-gray-400 hover:text-white">
                    <a href="#">자유게시판</a></li>
                <li class="text-center py-3 px-4 text-gray-400 hover:text-white">
                    <a href="#">자유게시판</a></li>
            </ul>
        </div>
        <div class="flex-auto text-center px-2 py-3">
            <a class="px-2 text-gray-400 hover:text-white" href="{{url('./users/register')}}">회원가입</a>
            <a class="px-2 text-gray-400 hover:text-white" href="#">로그인</a>
        </div>
        <div class="flex-auto"></div>
    </nav>
    <section class="h-80p">
        <div class="w-2/3 bg-white mx-auto min-h-full shadow-xl">
        @yield('content')
        </div>
    </section>
    <footer class="w-2/3 mx-auto">
        <div class="mt-4">
            Copyright
        </div>
    </footer>
</body>
</html>
