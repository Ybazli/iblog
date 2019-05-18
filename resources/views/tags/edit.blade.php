@extends('layouts.app')

@section('breadcrumb-pages')
    <a href="{{ route('tags.index') }}"
       class="text-grey-light no-underline hover:text-grey-dark">
        Tag
    </a>
    /<span class="uppercase">
                {{ $tag->name }}
            </span>
@endsection

@section('content')
    <div class="container ">
        <div class="mx-auto w-2/3 bg-white">
            <div class="p-4">
                <form action="{{ route('tags.update' , $tag) }}"
                      method="post"
                      class="mt-5">
                    {{ method_field('patch') }}
                    @csrf
                    <input type="text"
                           class="p-4 text-grey-darker w-full border-2 border-grey-lightest rounded focus:border-indigo-light outline-none text-sm mb-5"
                           value="{{ $tag->name }}"
                           name="name" placeholder="Your Tag Name">

                    <input type="text"
                           class="p-4 text-grey-darker w-full border-2 border-grey-lightest rounded focus:border-indigo-light outline-none text-sm"
                           value="{{ $tag->slug }}"
                           name="slug" placeholder="Say-Hello_Tag">

                    <div class="my-5">
                        <button type="submit"
                                class="py-3 px-6 bg-indigo-light text-white rounded text-sm">
                            Update
                        </button>

                    </div>
                </form>
            </div>
        </div>
@endsection