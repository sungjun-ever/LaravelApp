@extends('layouts.layout')

@section('title', '글쓰기')

@section('content')
    <div class="w-2/3 mx-auto">
        <form action="/boards" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="name" value="{{Auth::user()->name}}">
            <input id="title" class="border border-blue-200 w-full mt-16"
                   type="text" name="title" maxlength="30" value="{{old('title') ? old('title') : ''}}" placeholder="제목">
            @error('title')
                <div class="text-red-400">제목을 입력해주세요.</div>
            @enderror
            <textarea id="story" class="border border-blue-200 w-full h-80 mt-8 resize-none" name="story">{{old('story') ? old('story') : ''}}</textarea>
            @error('story')
                <div class="text-red-400">내용을 입력해주세요.</div>
            @enderror
            <div class="mt-4">
                <input type="file" name="user_image">
            </div>
            @error('image')
            <div class="text-red-400">사진 크기 또는 확장자를 확인해주세요.</div>
            @enderror
            <div class="text-center mt-10 pb-4">
                <input class="bg-green-500 hover:bg-green-700 px-5 py-1 text-white mr-6" type="submit" value="작성">
                <input class="bg-red-500 hover:bg-red-700 px-5 py-1 text-white" type="button" value="취소" onclick="history.back()">
            </div>
        </form>
    </div>
@endsection
