@extends('layouts.layout')

@section('title', 'Main')

@section('content')
    <div class="flex pt-8 ml-16">
        <div class="flex-1">
            <p class="w-fit text-xl border-b-2 border-blue-300">
                <a href="/boards">자유게시판</a>
            </p>
            @foreach($board as $item)
                <p class="border-b border-gray-200 w-3/4 mt-2">
                    <a href="/boards/{{$item->id}}">{{$item->title}}</a>
                </p>
            @endforeach
        </div>
        <div class="flex-1 ml-8">
            <p class="w-fit text-xl border-b-2 border-blue-300">자유게시판</p>
        </div>
    </div>
    <div class="flex pt-8 ml-16">
        <div class="flex-1">
            <p class="w-fit text-xl border-b-2 border-blue-300">자유게시판</p>
        </div>
        <div class="flex-1 ml-8">
            <p class="w-fit text-xl border-b-2 border-blue-300">아무게시판</p>
        </div>
    </div>
@endsection



