@extends('../layouts.layout')

@section('title', '회원가입')

@section('content')
    <div class="w-2/3 m-auto">
        <div class="w-fit m-auto text-left">
        <form class="pt-32" action="/register" method="post">
            @csrf
            <label for="userID">아이디: </label>
            <input class="border border-blue-400 mt-6" id="userID" type="text"><br>
            <label for="userPW">비밀번호: </label>
            <input class="border border-blue-400 mt-6" id="userPW" type="password"><br>
            <label for="userPWCon">비밀번호 확인: </label>
            <input class="border border-blue-400 mt-6" id="userPWCon" type="password"><br>
            <label for="userEmail">이메일: </label>
            <input class="border border-blue-400 mt-6" id="userEmail" type="email" size="30"><br>
            <div class="mt-8 text-center">
                <input class="px-6 py-1 bg-green-400 hover:bg-green-600" type="submit" value="가입">
                <input class="px-6 py-1 bg-red-500 hover:bg-red-700" type="button" value="취소">
            </div>
        </form>
        </div>
    </div>
@endsection
