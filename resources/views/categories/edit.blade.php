@extends('layouts.app')

@section('breadcrumb-pages')
    <a href="{{ route('categories.index') }}"
        class="text-grey-light no-underline hover:text-grey-dark">
        Category
    </a>
    / {{ $category->name }}
@endsection
@section('content')
    <div class="container">

        <div class="mx-auto w-2/3 bg-white">
            <div class="p-4">
                <form action="{{ route('categories.update' , $category) }}"
                      method="post"
                      class="mt-5">
                    @csrf
                    {{ method_field('patch') }}
                    <input type="text"
                           class="input-default"
                           value="{{ $category->name }}"
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