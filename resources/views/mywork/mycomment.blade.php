@extends('layouts.layout')

@section('title', '내 댓글')

@section('content')
    <div class="pt-32">
        <table class="w-5/6 text-center mx-auto shadow-lg">
            <thead class="text-center w-full">
            <td class="bg-blue-400 w-3/5 h-10 text-gray-800">댓글</td>
            <td class="bg-blue-400 w-1/5 h-10 text-gray-800">글쓴이</td>
            <td class="bg-blue-400 w-1/5 h-10 text-gray-800">날짜</td>
            </thead>
            @foreach($comments as $item)
                <tr class="border-b-2 border-gray-200">
                    <td class="w-3/5"><a href="/boards/{{$item->parent_id}}">{{$item->commentStory}}</a></td>
                    <td class="w-1/5"><a href="/boards/{{$item->parent_id}}">{{$item->userName}}</a></td>
                    <td class="w-1/5 text-sm"><a href="/boards/{{$item->parent_id}}">{{date("Y/m/d", strtotime($item->created_at))}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="flex items-stretch">
        {{ $comments->links('pagination::tailwind') }}
    </div>
@endsection
