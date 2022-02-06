@extends('admin.auth.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.submit') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" />
                                <label for="email">Email address</label>
                            </div>
                            @if ($errors->has('email'))
                                <div class="tex text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" id="password" type="password" placeholder="Password" />
                                <label for="password">Password</label>
                            </div>
                            @if ($errors->has('password'))
                                <div class="tex text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="password.html">Forgot Password?</a>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('registration.form') }}">Need an account? Sign up!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
