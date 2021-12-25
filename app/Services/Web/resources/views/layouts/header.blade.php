@php
$categories = App\Domains\Category\Jobs\SearchForCategoryJob::dispatchSync([
    "filter" => [
        "property" => 'published',
        "checkbox" => [
            'equals' => true
        ]
    ],
])['results']
@endphp

<header class="container px-4 pt-10 pb-5 w-[calc(theme(space.96)*2)] mx-auto max-w-full">
    <h1 class="mb-10 text-5xl text-center font-logo">lechihuy</h1>

    <nav class="relative flex items-center overflow-auto text-xl">
        {{-- Menu Bar --}}
        <div class="flex items-center font-semibold text-gray-500 cursor-pointer md:hidden">
            <span class="text-3xl material-icons-round">menu</span>
        </div>

        {{-- Links --}}
        <div class="items-center hidden gap-10 md:flex">
            <a href="{{ route('web.home') }}" class="flex-none font-semibold text-sky-500">Home</a>
            {{-- <a href="" class="flex-none font-semibold text-gray-500">Lập trình</a> --}}
            @foreach ($categories as $category)
                <a href="{{ route('web.detail', ['slug' => $category->slug]) }}" class="flex-none font-semibold text-gray-500">
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