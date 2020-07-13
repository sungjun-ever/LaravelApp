@extends('../layouts.layout')

@section('title', $board -> title)

@section('content')
    <div class="w-full border-b-2 border-blue-300  m-auto pt-24">
        <div class="flex ml-4 mb-2 text-left">
            <p class="flex-1">{{$board -> title}}</p>
            <small class="flex-1 text-right mr-4">{{$board->created_at}}</small>
        </div>
    </div>
    <div class="mt-4 ml-4">
        {{$board -> story}}
    </div>
    <div class="mt-4 w-full text-right">
        <a href="/boards/{{$board->id}}/edit" ><button class="py-1 px-4 bg-green-500 hover:bg-green-700 text-gray-200 mr-4">수정</button></a>
        <form class="inline" action="/boards/{{$board->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="py-1 px-4 bg-red-500 hover:bg-red-700 text-gray-200 mr-4">삭제</button>
        </form>
    </div>
@endsection
