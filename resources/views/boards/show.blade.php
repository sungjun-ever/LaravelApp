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
    <div class="inline-block mt-4 w-full text-right">
        <a href="/boards/{{$board->id}}/edit" ><button class="py-1 px-4 bg-green-500 hover:bg-green-700 text-gray-200 mr-4">수정</button></a>
            <form class="inline" action="/boards/{{$board->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input class="py-1 px-4 bg-red-500 hover:bg-red-700 text-gray-200 mr-4 show_confirm" type="submit" value="삭제" onclick="return confirm('정말 삭제하시겠습니까?')">
            </form>
    </div>
    <div class="inline-block mt-8 w-full text-left ml-6">
        <a href="{{url('./boards')}}"><button class="py-1 px-4 bg-blue-500 hover:bg-blue-700 text-gray-200 mr-4">목록</button></a>
    </div>
    <div class="mt-8">
        <table class="w-4/5 text-center mx-auto shadow-lg">
            <thead class="text-center w-full">
            <td class="bg-blue-400 w-1/5 h-10 text-gray-800">번호</td>
            <td class="bg-blue-400 w-3/5 h-10 text-gray-800">제목</td>
            <td class="bg-blue-400 w-1/5 h-10 text-gray-800">날짜</td>
            </thead>

            @foreach($boards as $item)
                <tr class="border-b-2 border-gray-200">
                    <td class="w-1/5 "><a href="/boards/{{$item->id}}">{{$item->id}}</a></td>
                    <td class="w-3/5"><a href="/boards/{{$item->id}}">{{$item->title}}</a></td>
                    <td class="w-3/5  text-sm"><a href="/boards/{{$item->id}}">{{date("Y/m/d", strtotime($item->created_at))}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
