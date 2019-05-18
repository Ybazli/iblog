@extends('layouts.app')
@section('breadcrumb-pages')
    <a href="{{ route('categories.index') }}"
       class="text-grey-light no-underline hover:text-grey-dark">
        Category
    </a>
    / Create a Category
@endsection
@section('content')
    <div class="container">

        <div class="mx-auto w-2/3 bg-white">
            <div class="p-4">
                <form action="{{ route('categories.store') }}"
                      method="post"
                      class="mt-5">
                    @csrf
                    <input type="text"
                           class="p-4 text-grey-darker w-full border-2 rounded focus:border-indigo-light outline-none text-sm"
                           name="name"
                           placeholder="Your Category Name">

                    <div class="my-5">
                        <button type="submit"
                                class="button">
                            Save
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection