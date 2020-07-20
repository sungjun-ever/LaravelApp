@extends('layouts.layout')

@section('title', '회원가입')

@section('content')
    <div class="m-auto w-2/3 pt-32">
        <form method="POST" action="/register" class="text-left w-fit m-auto">
            @csrf
            <div class=" text-left">
            <div>
                <label for="name">이름 : </label>
                <input id="name" type="text" class="border border-blue-400" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="text-red-500">이름을 확인하세요.</div>
                @enderror
            </div>
            <div class="mt-6">
                <label for="email">이메일 : </label>
                <input id="email" type="email" class="border border-blue-400" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500">이메일을 확인하세요.</div>
                @enderror
            </div>

            <div class="mt-6">
                <label for="password">비밀번호 : </label>
                <input id="password" type="password" class="border border-blue-400" name="password" placeholder=" 8자 이상">
                @error('password')
                    <div class="text-red-500">비밀번호를 확인하세요.</div>
                @enderror
            </div>

            <div class="mt-6">
                <label for="password-confirm">비밀번호 확인 : </label>
                <input id="password-confirm" type="password" class="border border-blue-400" name="password_confirm">
            </div>
            </div>

            <div class="mt-8 text-center">
                <input type="submit" class="py-1 px-6 mr-4 bg-blue-500 hover:bg-blue-700 text-white" value="가입">
                <input type="button" class="py-1 px-6 bg-red-500 hover:bg-red-700 text-white" value="취소" onclick="history.back()">
            </div>

        </form>
    </div>
@endsection
