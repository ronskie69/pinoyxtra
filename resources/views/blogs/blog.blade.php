@extends('layouts.layout')

@section('body')
    <div class="container p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
            </ol>
        </nav>
        @if (auth()->user())
            <a href="{{ route('new-blog') }}" class="btn btn-sm btn-magnum shadow-0 d-block ms-auto mb-4" style="width: fit-content">New Blog</a>
        @endif

        @if ($blogs->count())
            @foreach ($blogs as $blog)
            <a href="{{ route('view-blog', $blog->blog_id)}}">
                <div class="card mb-3 shadow-0 border">
                    <div class="card-header bg-dark text-white">
                        {{ $blog->blog_title}}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p><small>{{$blog->blog_content}}</small></p>
                            <footer class="blockquote-footer mt-4">
                                <small>Posted by <cite>{{ $blog->blog_creator}}</cite></small>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </a>
            @endforeach
            {{ $blogs->links()}}
        @else
            <p>No results.</p>
        @endif
    </div>
@endsection