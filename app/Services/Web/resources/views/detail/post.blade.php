@extends('web::layouts.master')

@section('content')
<section class="overflow-hidden bg-white shadow-lg md:rounded-lg">
    @if ($post->thumbnail)
        <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" />
    @endif
    
    <div class="p-4 sm:p-5 md:p-7">
        <div class="mb-10">
            <h1 class="mb-2 text-4xl font-bold">{{ $post->title }}</h1>
            <time class="block mt-2 text-sm text-gray-500">{{ Carbon\Carbon::create($post->created_at) }}</time>
        </div>
        
        <div class="max-w-full prose-lg">
            {!! $post->content !!}
        </div>
    </div>
</section>
@endsection