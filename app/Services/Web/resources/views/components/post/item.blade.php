<article class="overflow-hidden bg-white rounded-lg shadow-lg">
    {{-- Thumbnail --}}
    @if ($post->thumbnail)
        <a href="{{ route('web.detail', ['slug' => $post->slug]) }}" class="block">
            <img 
                src="{{ $post->thumbnail }}" 
                alt="{{ $post->title }}"
                class="block object-cover w-full h-full"
            />
        </a>
    @endif

    <div class="p-7">
        {{-- Series --}}
        {{-- <a href="" class="block mb-2 text-gray-500 underline">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a> --}}
        
        {{-- Heading --}}
        <a href="{{ route('web.detail', ['slug' => $post->slug]) }}">
            <h3 class="text-2xl font-bold">{{ $post->title }}</h3>
        </a>

        {{-- Meta --}}
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
        
        {{-- Tags --}}
        @if ($post->tags()->count())
            <div class="flex items-center gap-2 mt-7">
                @foreach ($post->tags()->all() as $tag)
                    <a href="{{ route('web.detail', ['slug' => $tag->slug]) }}" class="inline-block px-3 py-1 text-gray-500 rounded-lg bg-slate-100 hover:bg-slate-200 hover:text-gray-700">
                        # {{ $tag->title }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</article>