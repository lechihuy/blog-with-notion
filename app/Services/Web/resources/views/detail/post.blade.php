@extends('web::layouts.master')

@section('content')

<section class="overflow-hidden bg-white shadow-lg md:rounded-lg">
    @if ($post->thumbnail)
        <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" />
    @endif
    
    <div class="p-4 sm:p-5 md:p-7">
        <div class="mb-10">
            <h1 class="mb-2 text-4xl font-bold">{{ $post->title }}</h1>

            <div class="flex items-center gap-2 mt-2">
                {{-- Category --}}
                <a href="{{ route('web.detail', ['slug' => $post->category()->slug]) }}" class="text-gray-500">
                    {{ $post->category()->title }}
                </a>
                
                <span class="text-gray-300">&bull;</span>

                {{-- Time --}}
                <time class="text-gray-500">
                    {{ Carbon\Carbon::create($post->created_at) }}
                </time>
            </div>
        </div>
        
        {{-- Content --}}
        <div class="max-w-full prose-lg">
            {!! $post->content !!}
        </div>

        {{-- Tags --}}
        @if ($post->tags()->count())
            <div class="flex items-center gap-2 mt-10">
                @foreach ($post->tags()->all() as $tag)
                    <a href="{{ route('web.detail', ['slug' => $tag->slug]) }}" class="inline-block px-3 py-1 text-gray-500 rounded-lg bg-slate-100 hover:bg-slate-200 hover:text-gray-700">
                        # {{ $tag->title }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection