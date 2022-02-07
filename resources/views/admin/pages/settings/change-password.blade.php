@extends('admin.layouts.master')

@section('title')
    Password Changer
@endsection
@section('main-content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Settings</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">User Update Profile</li>
                </ol>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card middle">
                            <div class="card-header">
                           @include('admin.layouts.partial.messages')
                                <h4>User Password Change</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('update.password') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Enter Old Password">
                                    </div>
                                    @if ($errors->has('old_password'))
                                        <div class="tex text-danger">
                                            {{ $errors->first('old_password') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="tex text-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                                    </div>
                                    @if ($errors->has('confirm_password'))
                                        <div class="tex text-danger">
                                            {{ $errors->first('confirm_password') }}
                                        </div>
                                    @endif
                                    <div class="form-group mt-3 text-right">
                                        <button type="submit" class=" btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('admin.layouts.partial.footer')
    </div>
@endsection
