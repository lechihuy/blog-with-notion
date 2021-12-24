@extends('web::layouts.master')

@section('content')
    <x-web::post.collection 
        :posts="$posts"
    />
@endsection