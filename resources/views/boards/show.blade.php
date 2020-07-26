@extends('layouts.layout')

@section('title', $board -> title)

@section('content')
    <div class="w-full pr-4 pl-4">
    <div class="w-full border-b-2 border-blue-300 m-auto pt-24">
        <div class="flex ml-4 mb-2 text-left">
            <p class="flex-auto font-semibold">{{$board -> title}}</p>
            <p class="flex-auto text-right mr-4 text-sm">{{$board -> name}}</p>
        </div>
    </div>
    </div>

    {{--  내용  --}}
    <div class="mt-4 ml-4">
        @if ($board -> user_image)
        <img class="mb-4 m-auto" src="{{asset('storage/images/'.$board->imageName)}}" alt="사진" />
        @endif
        {{$board -> story}}
    </div>

    {{--  수정, 삭제 버튼  --}}
    @if($board->userID == auth()->id())
    <div class="inline-block mt-4 w-full text-right">
        <a href="/boards/{{$board->id}}/edit" ><button class="py-1 px-4 bg-green-500 hover:bg-green-700 text-gray-200 mr-4">수정</button></a>
        <form class="inline" action="/boards/{{$board->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input class="py-1 px-4 bg-red-500 hover:bg-red-700 text-gray-200 mr-4 show_confirm" type="submit" value="삭제" onclick="return confirm('정말 삭제하시겠습니까?')">
        </form>
    </div>
    @endif

    {{--  목록 버튼  --}}
    <div class="inline-block mt-8 w-full text-left ml-6">
        <a href="{{url('./boards')}}"><button class="py-1 px-4 bg-blue-500 hover:bg-blue-700 text-gray-200 mr-4">목록</button></a>
    </div>

    {{--  댓글 목록  --}}
    <div>
        @foreach($comment as $item)
            {{$item->userName}}
            {{$item->commentStory}}
        @endforeach
    </div>
    {{--  댓글작성   --}}
    @auth()
    <div class="w-4/5 mx-auto mt-6 text-right">
    <form method="post" action="{{route('comment.add')}}">
        @csrf
        <input type="hidden" name="parent_id" value="{{$board->id}}">
        <textarea name="commentStory" class="border border-blue-300 resize-none w-full h-32"></textarea>
        <input type="submit" value="작성" class="mt-4 px-4 py-1 bg-gray-500 hover:bg-gray-700 text-gray-200">
    </form>
    </div>
    @endauth
    {{-- 목록  --}}
    <div class="mt-8">
        <table class="w-5/6 text-center mx-auto shadow-lg">
            <thead class="text-center w-full">
            <td class="bg-blue-400 w-1/6 h-10 text-gray-800">번호</td>
            <td class="bg-blue-400 w-2/6 h-10 text-gray-800">제목</td>
            <td class="bg-blue-400 w-2/6 h-10 text-gray-800">글쓴이</td>
            <td class="bg-blue-400 w-2/6 h-10 text-gray-800">날짜</td>
            </thead>

            @foreach($boards as $item)
                <tr class="border-b-2 border-gray-200">
                    <td class="w-1/6 "><a href="/boards/{{$item->id}}">{{$item->id}}</a></td>
                    <td class="w-2/6"><a href="/boards/{{$item->id}}">{{$item->title}}</a></td>
                    <td class="w-2/6"><a href="/boards/{{$item->id}}">{{$item->name}}</a></td>
                    <td class="w-2/6 text-sm"><a href="/boards/{{$item->id}}">{{date("Y/m/d", strtotime($item->created_at))}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
