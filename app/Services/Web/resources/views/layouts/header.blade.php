@php
$categories = App\Domains\Category\Jobs\SearchForCategoryJob::dispatchSync([
    "filter" => [
        "property" => 'published',
        "checkbox" => [
            'equals' => true
        ]
    ],
])['results'];
@endphp

<header class="container px-4 pt-10 pb-5 w-[calc(theme(space.96)*2)] mx-auto max-w-full">
    <h1 class="flex items-center justify-center mb-10 text-5xl font-logo">
        <img src="{{ asset('images/lechihuy.png') }}" alt="lechihuy" class="w-16 mr-5"> lechihuy
    </h1>

    <nav class="relative flex items-center text-xl">
        {{-- Menu Bar --}}
        <div id="menu-bar" class="flex items-center font-semibold text-gray-500 cursor-pointer select-none md:hidden">
            <span class="text-3xl material-icons-round">menu</span>
        </div>
        
        {{-- Links --}}
        <div id="nav-links" 
            class="absolute hidden py-3 bg-white rounded-lg shadow-lg w-96 top-10 md:flex md:items-center md:gap-10 md:bg-transparent md:w-auto md:top-0 md:shadow-none md:relative md:py-0"
        >
            <a href="{{ route('web.home') }}" 
                class="block px-5 py-3 font-semibold text-gray-500 md:px-0 md:py-0 md:flex-none @if (Route::currentRouteName() === 'web.home') text-sky-600 @endif"
            >Home</a>
            @foreach ($categories as $category)
                <a 
                    href="{{ route('web.detail', ['slug' => $category->slug]) }}" 
                    class="block px-5 py-3 font-semibold text-gray-500 md:px-0 md:py-0 md:flex-none @if ($category->slug === request()->slug) text-sky-500 @endif"
                >
                    {{ $category->title }}
                </a>
            @endforeach
        </div>

        {{-- Search --}}
        <div class="ml-auto">
            <div class="flex items-center font-semibold text-gray-500 cursor-pointer">
                <span class="text-3xl material-icons-round">search</span>
                <span class="hidden md:inline-block">Tìm kiếm</span>
            </div>
        </div>
    </nav>
</header>

@push('scripts')
<script>
    $('#menu-bar').on('click', function() {
        $('#nav-links').toggleClass('hidden')
    })
</script>
@endpush