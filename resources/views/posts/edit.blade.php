@extends('layouts.app')

@section('breadcrumb-pages')
    <a href="/blog" class="text-grey-light no-underline hover:text-grey-dark">
        Blog
    </a>
    / {{ $post->title }}
@endsection

@section('breadcrumb-btn-group')
    @include('partials.post-btn-group')
@endsection

@section('content')

    <form action="{{ route('posts.update' , $post) }}" method="post">

        @csrf

        <category-modal cats="{{ $categories }}" data="{{ $post->category }}"></category-modal>

        <tags-modal tags="{{ $tags }}" data="{{ $post->tags }}"></tags-modal>

        <featured-image-upload-modal data="{{ $post->image }}"></featured-image-upload-modal>

        <meta-tags-modal data="{{ $post->meta }}"></meta-tags-modal>

        <div class="my-5">
            <input type="text"
                   name="title"
                   value="{{ $post->title }}"
                   class="post-input-title"
                   placeholder="Title">
        </div>

        <mini-text-editor data="{{ $post->body }}"></mini-text-editor>

        <div class="my-5">
            <button type="submit"
                    class="py-3 px-6 bg-indigo-light text-white rounded">
                Update
            </button>

        </div>



    </form>
@endsection