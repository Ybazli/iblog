@extends('layouts.app')
@section('content')
    <div class="container">

        @include('partials.search' , ['type' => 'posts'])

        <div class="lg:flex lg:flex-wrap">

            @foreach($posts as $post)
                <div class="lg:w-1/3">
                    <div class="relative bg-white rounded shadow mb-4 mr-4"
                         style="height: 280px">
                        <div class="text-center bg-grey-lightest  {{ $post->image ? 'overflow-hidden' : '' }}"
                             style="height: 154px;">
                            @if($post->image)
                                <img src="{{ asset($post->image) }}"
                                     alt="{{ $post->title }}">
                            @else
                                <img src="{{  asset('images/assets/no-image.png') }}"
                                     alt="{{ $post->title }}" width="150px">
                            @endif
                        </div>
                        <h3 class="border-l-4 border-indigo-light pl-2 py-2">
                            <a href="{{ route('posts.edit' , $post) }}"
                               class="no-underline text-indigo-light text-lg">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <div class="italic text-xs text-grey-light mt-1 ml-3">
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
                        </div>

                        <div class="absolute pin-x pin-b flex justify-between py-4 mx-3">

                            <div class="text-grey-dark italic">
                                {{ $post->owner->fullname() }}
                            </div>

                            <div>
                                <form action="{{ route('posts.delete' , $post) }}"
                                      method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            class="text-red-light mr-4">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="text-center">
            {{ $posts->links() }}
        </div>

    </div>
@endsection