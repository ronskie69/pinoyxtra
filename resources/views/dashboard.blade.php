@extends('layouts.layout')


@section('body')
    <div class="container p-4">
        <hr>
        <div class="row mt-4">
            <div class="col-md-4 col-sm-12">
                <h4>Profile</h4>
                <p>Update your alias anytime.</p>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card p-4 shadow-0 border">
                    <form action="" method="POST">
                        <div class="form-group mb-4">
                            <label class="d-inline-flex">
                                Username:&nbsp;&nbsp;
                                <p class="text-info" style="font-size: 80%;">(Username is permanent.)</p>
                            </label>
                            <input type="text" name="username" id="username" value="{{ auth()->user()->username }}" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label>Alias:</label>
                            <input type="text" name="alias" id="alias" value="{{ auth()->user()->name }}" class="form-control">
                        </div>
                        <button class="btn btn-submit d-block ms-auto btn-magnum shadow-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-5">
            <div class="col-md-4 col-sm-12">
                <h4>Change Password</h4>
                <p>Update your password for enhanced security.</p>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card p-4 shadow-0 border">
                    <form action="" method="POST">
                        <div class="form-group mb-4">
                            <label>Enter Old Password:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button class="btn btn-submit d-block ms-auto btn-magnum shadow-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection