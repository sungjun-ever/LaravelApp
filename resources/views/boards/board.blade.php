@extends('../layouts.layout')

@section('title', '게시판')

@section('content')
    <div class="w-full text-right pt-10 pr-4">
        <a href="/boards/create">
            <button class="bg-blue-500 hover:bg-blue-700 px-4 py-1 text-white shadow-lg">글쓰기</button>
        </a>
    </div>
    <div class="mt-6">
        <table class="w-4/5 text-center mx-auto shadow-lg">
            <thead class="text-center">
                <td class="bg-blue-400 w-1/5 h-10 text-gray-800">번호</td>
                <td class="bg-blue-400 w-3/5 h-10 text-gray-800">제목</td>
                <td class="bg-blue-400 w-1/5 h-10 text-gray-800">날짜</td>
            </thead>

        @foreach($boards as $item)
            <tr class="border-b-2 border-gray-200">
                <td class="w-1/5 "><a href="/boards/{{$item->id}}">{{$item->id}}</a></td>
                <td class="w-3/5"><a href="/boards/{{$item->id}}">{{$item->title}}</a></td>
                <td class="w-1/5  text-sm"><a href="/boards/{{$item->id}}">{{date("Y/m/d", strtotime($item->created_at))}}</a></td>
            </tr>
        @endforeach
        </table>
    </div>
    <div class="flex items-stretch">
        {{ $boards->links('pagination::tailwind') }}
    </div>
@endsection
