@extends('layouts.app')
@section('content')
    <div class="flex justify-between">
        <div>
            <p class="text-grey-light">
                <a href="/blog" class="text-grey-light no-underline hover:text-grey-dark">
                    Dashboard
                </a>
                /<a href="/blog" class="text-grey-light no-underline hover:text-grey-dark">
                    Blog
                </a>
                / Create a Post
            </p>
        </div>
        <div>

            @include('partials.post-btn-group')

        </div>
    </div>
    <form action="{{ route('posts.store') }}" method="post">

        @csrf

        <category-modal cats="{{ $categories }}" data="{{ old('category_id') }}"></category-modal>

        <tags-modal tags="{{ $tags }}" data="{{ old('tags') }}"></tags-modal>

        <featured-image-upload-modal data="{{ old('image') }}"></featured-image-upload-modal>

        <meta-tags-modal data="{{ old('meta') }}"></meta-tags-modal>

        <div class="my-5">
            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   class="w-full py-5 pl-5 rounded font-serif text-2xl"
                   placeholder="Title">
        </div>

        <mini-text-editor data="{{ old('body') }}"></mini-text-editor>

        <div class="my-5">
            <button type="submit"
                    class="py-3 px-6 bg-indigo-light text-white rounded">
                Save
            </button>

        </div>



    </form>
@endsection