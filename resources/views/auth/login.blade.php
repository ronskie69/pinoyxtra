@extends('layouts.layout')

@section('body')
    <div class="container mt-4 p-4">
        <div class="card shadow-0 border d-block m-auto p-4" style="max-width: 500px;">
            <img src="{{ asset('images/pinoyxtra3.png')}}" alt="Logo" class="img-fluid d-block m-auto" style="height: 120px; width: 150px; transform: scale(2)">
            <h5 class="text-center">Sign Up to <span class="text-magnum"><strong>PinoyXtra</strong></span>.</h5>
            @if (session('status'))
                <div class="alert-alert-danger mb-2">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="username" placeholder="Enter your username here...." id="username" value="{{ old('username')}}">
                    @error('username')
                        <div class="invalid-feedback">
                            <small> {{ $message }}</small>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password here...." id="password" value="{{ old('password')}}">
                    @error('password')
                        <div class="invalid-feedback">
                            <small> {{ $message }}</small>
                        </div>
                    @enderror
                </div>  
                <a href="{{ route('register')}}" class="text-center text-white" style="text-decoration: underline"><small>I have no account</small></a>
                <button class="btn btn-magnum float-end btn-sm shadow-0">Log In</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
@endsection