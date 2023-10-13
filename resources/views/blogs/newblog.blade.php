@extends('layouts.layout')

@section('body')
    <div class="container p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Blog</li>
            </ol>
        </nav>
        <h5 class="mt-2 mb-4">New Blog</h5>
        <form action="{{ route('blogs')}}" class="form" method="POST">
            @csrf
            <input type="hidden" name="blog_creator" value="{{ auth()->user()->username }}">
            <div class="form-group mb-4">
                <label for="blog_title">Blog Title:</label>
                <input type="text" class="form-control @error('blog_title') is-invalid @enderror" name="blog_title">
                @error('blog_title')
                    <span class="invalid-feedback"> {{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="blog_title">Blog Title:</label>
                <textarea name="blog_content" id="blog_content" rows="2" class="form-control @error('blog_content') is-invalid @enderror"></textarea>
                @error('blog_content')
                    <span class="invalid-feedback"> {{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-magnum shadow-0" name="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection