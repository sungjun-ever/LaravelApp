@extends('layouts.layout')

@section('title', '정보수정')

@section('content')
    <div class="mx-auto text-center">
        <form action="/auth/edituser" method="post" class="pt-32 mx-auto w-fit text-left">
            @csrf
            @foreach($user as $item)
                <p class="text-xl">이메일 : {{$item->email}}</p>
                <p class="mt-4 text-xl">이름 : {{$item->name}}</p>
                <label for="password" class="text-xl">비밀번호 : </label>
                <input id="password" name="password" type="password" class="mt-4 border border-blue-400"><br>
                @error('password')
                <div>
                    <small class="text-red-500">비밀번호를 확인해주세요.</small>
                </div>
                @enderror
                <label for="password-confirm" class="text-xl">비밀번호 확인 : </label>
                <input id="password-confirm" name="password_confirmation" type="password" class="mt-4 border border-blue-400">
                <div class="mt-6 text-center">
                    <input type="submit" class="px-4 py-1 bg-blue-500 hover:bg-blue-700 text-white" value="수정">
                    <input type="button" class="px-4 py-1 bg-red-500 hover:bg-red-700 ml-4 text-white" value="취소" onclick="history.back()">
                </div>
            @endforeach
        </form>
    </div>
@endsection
