@extends('layouts.layout')

@section('body')
    <div class="container mt-4">
        <div class="card shadow-0 border d-block m-auto p-4" style="max-width: 500px;">
            <img src="{{ asset('images/pinoyxtra3.png')}}" alt="Logo" class="img-fluid d-block m-auto" style="height: 120px; width: 150px; transform: scale(2)">
            <h5 class="text-center">Sign Up to <span class="text-magnum"><strong>PinoyXtra</strong></span>.</h5>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="name">Enter Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter your name here...." id="name" value="{{ old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">
                            <small> {{ $message }}</small>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="username">Preferred Username:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="username" placeholder="Enter your username here...." id="username" value="{{ old('username')}}">
                    @error('username')
                        <div class="invalid-feedback">
                            <small> {{ $message }}</small>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="password">Preferred Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password here...." id="password" value="{{ old('password')}}">
                    @error('password')
                        <div class="invalid-feedback">
                            <small> {{ $message }}</small>
                        </div>
                    @enderror
                </div>  
                <div class="form-group mb-4">
                    <label for="password_confirmation">Retype Password:</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter your password here...." id="password" value="{{ old('password')}}">
                    @error('password')
                        <div class="invalid-feedback">
                            <small> {{ $message }}</small>
                        </div>
                    @enderror
                </div>
                <a href="{{ route('login')}}" class="text-center text-white" style="text-decoration: underline"><small>I already have an account</small></a>
                <button class="btn btn-magnum float-end btn-sm shadow-0">Sign Up</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
@endsection