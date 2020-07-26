@extends('layouts.layout')

@section('title', '수정')

@section('content')
    <div class="w-2/3 mx-auto">
        <form action="/boards/{{$board->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <lable for="title"></lable>
            <input id="title" class="border border-blue-200 w-full mt-16" type="text" name="title" value="{{old('title') ? old('title') : $board->title}}">
            @error('title')
            <div class="text-red-400">제목을 입력해주세요.</div>
            @enderror
            <textarea id="story" class="border border-blue-200 w-full h-80 mt-8 resize-none" name="story">{{old('story') ? old('story') : $board->story}}</textarea>
            @error('story')
            <div class="text-red-400">내용을 입력해주세요.</div>
            @enderror
            @if ($board->user_image)
                <div class="mt-2">
                <a href="#">{{$board->imageName}}
                    <p class="inline text-red-500">X</p></a>
                </div>
            @endif
            <input type="file" name="user_image" class="mt-4">
            <div class="text-center mt-3 pb-4">
                <input class="bg-green-500 hover:bg-green-700 px-5 py-1 text-white mr-6" type="submit" value="수정">
                <input class="bg-red-500 hover:bg-red-700 px-5 py-1 text-white" type="button" value="취소" onclick="history.back()">
            </div>
        </form>
    </div>
@endsection

