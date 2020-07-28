@extends('layouts.layout')

@section('title', '내 게시글')

@section('content')
    <div class="pt-32">
        <table class="w-5/6 text-center mx-auto shadow-lg">
            <thead class="text-center w-full">
            <td class="bg-blue-400 w-1/6 h-10 text-gray-800">번호</td>
            <td class="bg-blue-400 w-2/6 h-10 text-gray-800">제목</td>
            <td class="bg-blue-400 w-2/6 h-10 text-gray-800">글쓴이</td>
            <td class="bg-blue-400 w-2/6 h-10 text-gray-800">날짜</td>
            </thead>

            @foreach($board as $item)
                <tr class="border-b-2 border-gray-200">
                    <td class="w-1/6 "><a href="/boards/{{$item->id}}">{{$item->id}}</a></td>
                    <td class="w-2/6"><a href="/boards/{{$item->id}}">{{$item->title}}</a></td>
                    <td class="w-2/6"><a href="/boards/{{$item->id}}">{{$item->name}}</a></td>
                    <td class="w-2/6 text-sm"><a href="/boards/{{$item->id}}">{{date("Y/m/d", strtotime($item->created_at))}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="flex items-stretch">
        {{ $board->links('pagination::tailwind') }}
    </div>
@endsection
