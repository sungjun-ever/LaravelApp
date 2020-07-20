@extends('layouts.layout')

@section('title', '로그인')

@section('content')
    <div class="m-auto pt-32 ">
        <div class="w-2/5 h-100 m-auto pl-2 pr-2 pt-4 shadow-2xl bg-light min-w-50">
        <div class="mb-8 text-2xl text-center">로그인</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email" class="text-base">{{ __('이메일') }}</label>
            <div class="w-full">
                <input id="email" type="email" class="w-full border border-blue-400 mb-8 mt-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>

            <label for="password" class="">{{ __('비밀번호') }}</label>
            <div class="w-full">
                <input id="password" type="password" class="w-full border border-blue-400 mb-4 mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>

            <div>
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="" for="remember">{{ __('Remember Me') }}</label>
            </div>

            <div class="text-center">
                <button type="submit" class="py-1 px-4 text-white bg-blue-500 hover:bg-blue-700 mt-4 mr-4">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
        </div>
    </div>
@endsection
