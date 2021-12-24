@extends('web::layouts.master')

@section('content')
<section class="overflow-hidden bg-white rounded-lg shadow-lg ro rounde">
    <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" />
    <div class="p-7">
        <h1 class="text-4xl font-bold mb-7">{{ $post->title }}</h1>
        
        <div class="max-w-full prose-lg">
            {!! $post->content !!}
        </div>
    </div>
</section>
@endsection