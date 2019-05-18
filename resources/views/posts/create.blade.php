@extends('layouts.app')
@section('breadcrumb-pages')

    <a href="{{ route('posts.index') }}" class="breadcrumb-link">
        Blog
    </a>
    / Create a Post
@endsection

@section('breadcrumb-btn-group')
    @include('partials.post-btn-group')
@endsection


@section('content')
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
                    class="button">
                Save
            </button>

        </div>



    </form>
@endsection