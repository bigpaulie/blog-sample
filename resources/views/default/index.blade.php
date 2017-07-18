@extends('layouts.blog')
@section('content')

    @foreach($posts as $post)
        <div class="blog-post">
            <h2 class="blog-post-title">
                <a href="{{ url('default/show/' . $post->id) }}">{{ $post->title }}</a></h2>
            <p class="blog-post-meta">{{ $post->created_at }} by {{ $post->user->name }}</p>

            <p>{{ $post->text }}</p>
        </div><!-- /.blog-post -->
    @endforeach

@endsection