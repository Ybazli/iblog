@extends('layouts.app')

@section('content')

    <div class="lg:w-2/5 mx-auto mt-20 rounded bg-white shadow p-10">

        <h3 class="text-center text-grey-darker mb-6">Register</h3>
        <form action="{{ route('register') }}" method="post">
            @csrf

            <div class="mb-4">
                <label class="text-grey-dark text-xs" for="first_name">First Name</label>
                <input
                        class="mt-3 block border-2 border-grey-lighter w-full py-3 rounded"
                        type="text"
                        id="first_name"
                        name="name"
                        value="{{ old('first_name') }}"
                        required>
            </div>

            <div class="mb-4">
                <label class="text-grey-dark text-xs" for="last_name">Last Name</label>
                <input
                        class="mt-3 block border-2 border-grey-lighter w-full py-3 rounded"
                        type="text"
                        id="last_name"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        required>
            </div>

            <div class="mb-4">
                <label class="text-grey-dark text-xs" for="username">Username</label>
                <input
                        class="mt-3 block border-2 border-grey-lighter w-full py-3 rounded"
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        required>
            </div>

            <div class="mb-4">
                <label class="text-grey-dark text-xs" for="email">Email</label>
                <input
                        class="mt-3 block border-2 border-grey-lighter w-full py-3 rounded"
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required>
            </div>

            <div class="mb-6">
                <label class="text-grey-dark text-xs" for="password">Password</label>
                <input
                        class="mt-3 block border-2 border-grey-lighter w-full py-3 rounded"
                        type="password"
                        name="password"
                        id="password">
            </div>

            <div class="mb-8">
                <label class="text-grey-dark text-xs" for="confirm_password">Confirm Password</label>
                <input
                        class="mt-3 block border-2 border-grey-lighter w-full py-3 rounded"
                        type="password"
                        name="password_confirm"
                        id="confirm_password">
            </div>

            <div>
                <input class="bg-indigo-light text-white py-3 px-5 rounded shadow"
                       type="submit"
                       value="Sign Up">
            </div>
            <div class="mt-4">
                <span class="text-grey-dark text-xs">If you already have account </span>
                <a href="{{ route('login') }}" class="no-underline text-sm text-indigo-light">Sign In</a>
            </div>
        </form>

    </div>

@endsection