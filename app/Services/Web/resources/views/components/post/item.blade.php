<article class="overflow-hidden bg-white rounded-lg shadow-lg">
    @if ($post->thumbnail)
        <a href="" class="block">
            <img 
                src="{{ $post->thumbnail }}" 
                alt="{{ $post->title }}"
                class="block object-cover w-full h-full"
            />
        </a>
    @endif

    <div class="p-7">
        <a href="" class="block mb-2 text-gray-500 underline">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
        <a href="">
            <h3 class="text-2xl font-bold">{{ $post->title }}</h3>
        </a>
        <div class="flex gap-2 mt-7">
            <a href="" class="inline-block px-3 py-1 text-gray-500 rounded-lg bg-slate-100 hover:bg-slate-200 hover:text-gray-700">
                {{ $post->category()->title }}
            </a>
        </div>
    </div>
</article>