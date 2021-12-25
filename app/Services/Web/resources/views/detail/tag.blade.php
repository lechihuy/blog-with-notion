@extends('web::layouts.master')

@section('content')
    <div class="mb-10 bg-white rounded-lg shadow-lg p-7">
        <h1 class="text-3xl font-bold"># {{ $tag->title }}</h1>
        @if ($tag->description)
            <p class="mt-2 text-gray-500 lead">
                {{ $tag->description }}
            </p>
        @endif
    </div>

    <x-web::post.collection 
        :posts="$tag->posts()"
    />
@endsection