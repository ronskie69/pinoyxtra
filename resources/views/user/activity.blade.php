@extends('layouts.layout')

@section('body')
    <div class="container p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Activity Log</li>
            </ol>
        </nav>
    </div>
@endsection