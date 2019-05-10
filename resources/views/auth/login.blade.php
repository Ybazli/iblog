@extends('layouts.app')

@section('content')

    <div class="lg:w-2/5 mx-auto mt-20 rounded bg-white shadow p-10">
        <h3 class="text-center text-grey-darker mb-6">Login</h3>
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="mb-4">
                <label class="text-grey-dark text-xs" for="email">Email</label>
                <input
                        class="mt-3 block border-2 border-grey-lighter w-full py-3 rounded"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required>
            </div>

            <div class="mb-8">
                <label class="text-grey-dark text-xs" for="password">Password</label>
                <input
                        class="mt-3 block border-2 border-grey-lighter w-full py-3 rounded"
                        type="password"
                        name="password"
                        id="password">
            </div>

            <div class="mb-6 items-center">
                <input class="mr-2 leading-tight" type="checkbox" name="remmember" id="remmember">
                <span class="text-sm text-grey-dark">Remmember Me ?</span>
            </div>
            
            <div class="mb-6">
                <input class="bg-indigo-light text-white py-3 px-6 rounded shadow"
                       type="submit"
                       value="Sign In">
                <span class="text-grey-dark text-xs">or</span>
                <a href="{{ route('register') }}" class="no-underline text-sm text-indigo-light">Sign Up</a>
            </div>

            <div class="">
                <a class="text-xs no-underline text-indigo-light"
                        href="#">Did you forgot your password?</a>
            </div>

        </form>

    </div>

@endsection