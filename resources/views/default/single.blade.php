@extends('layouts.blog')
@section('content')

        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ $post->created_at }} by {{ $post->user->name }}</p>

            <p>{{ $post->text }}</p>
        </div><!-- /.blog-post -->

@endsection