<section class="flex flex-col gap-7">
    @foreach ($posts as $post)
        <x-web::post.item
            :post="$post"
        />
    @endforeach
</section>