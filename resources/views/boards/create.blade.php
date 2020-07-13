@extends('../layouts.layout')

@section('title', '글쓰기')

@section('content')
    <div class="w-2/3 mx-auto">
        <form action="/boards" method="post">
            @csrf
            <input id="title" class="border border-blue-200 w-full mt-16" type="text" name="title" maxlength="30" required>
            <textarea id="story" class="border border-blue-200 w-full h-80 mt-8 resize-none" name="story" required></textarea>
            <div class="text-center mt-3 pb-4">
                <input class="bg-green-500 hover:bg-green-700 px-5 py-1 text-white mr-6" type="submit" value="작성">
                <input class="bg-red-500 hover:bg-red-700 px-5 py-1 text-white" type="button" value="취소" onclick="history.back()">
            </div>
        </form>
    </div>
@endsection
