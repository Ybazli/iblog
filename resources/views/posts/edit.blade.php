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
                / {{ $post->title }}
            </p>
        </div>
        <div>

            @include('partials.post-btn-group')

        </div>
    </div>
    <form action="{{ route('posts.update' , $post) }}" method="post">

        @csrf

        <category-modal cats="{{ $categories }}" data="{{ $post->category }}"></category-modal>

        <tags-modal tags="{{ $tags }}" data="{{ $post->tags }}"></tags-modal>

        <featured-image-upload-modal data="{{ $post->image }}"></featured-image-upload-modal>

        <meta-tags-modal></meta-tags-modal>

        <div class="my-5">
            <input type="text"
                   name="title"
                   value="{{ $post->title }}"
                   class="w-full py-5 pl-5 rounded font-serif text-lg"
                   placeholder="Title">
        </div>

        <mini-text-editor data="{{ $post->body }}"></mini-text-editor>

        <div class="my-5">
            <button type="submit"
                    class="py-3 px-6 bg-indigo-light text-white rounded">
                Save
            </button>

        </div>



    </form>
@endsection