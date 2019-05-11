@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="flex flex-wrap">
            @foreach($posts as $post)
                <div class="w-1/3">
                    <div class="p-3 bg-white rounded shadow mb-4 mr-4" style="height: 220px">
                        <h3 class="mb-5 mt-2 border-l-2 pl-2">
                            <a href="#" class="no-underline text-indigo text-lg">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p>
                            {{ str_limit($post->short_description , 100) }}
                        </p>
                    <div class="flex justify-between mt-6">
                        <div>
                            <ul class="list-reset">
                                <li class="mb-1">
                                    {{ $post->owner->fullname() }}
                                </li>
                                <li>

                                    {{ $post->created_at }}
                                </li>
                            </ul>
                        </div>
                        <div>
                            <a href="{{ route('posts.edit' , $post) }}">Edit</a>
                            <a href="#">Remove</a>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection