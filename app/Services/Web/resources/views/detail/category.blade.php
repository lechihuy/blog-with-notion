@extends('web::layouts.master')

@section('content')
    <div class="mb-10 bg-white rounded-lg shadow-lg p-7">
        <h1 class="text-3xl font-bold">{{ $category->title }}</h1>
        @if ($category->description)
            <p class="mt-2 text-gray-500 lead">
                {{ $category->description }}
            </p>
        @endif
    </div>

    <x-web::post.collection 
        :posts="$category->posts()"
    />
@endsection