@extends('admin.auth.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('registration.form.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="first_name" id="first_name" type="text" placeholder="Enter your first name" />
                                        <label for="first_name">First name</label>
                                    </div>
                                    @if ($errors->has('first_name'))
                                        <div class="text text-danger">
                                            {{ $errors->first('first_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" name="last_name" id="last_name" type="text" placeholder="Enter your last name" />
                                        <label for="last_name">Last name</label>
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <div class="text text-danger">
                                            {{ $errors->first('last_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="email" id="email" type="text" placeholder="Enter your Email" />
                                        <label for="email">Email</label>
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="text text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Enter your Phone No" />
                                        <label for="mobile">Phone No</label>
                                    </div>
                                    @if ($errors->has('mobile'))
                                        <div class="text text-danger">
                                            {{ $errors->first('mobile') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="password" id="password" type="password" placeholder="Create a password" />
                                        <label for="password">Password</label>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="text text-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm password" />
                                        <label for="password_confirmation">Confirm Password</label>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="text text-danger">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <button type="submit" class="btn btn-primary btn-block">Create An Account</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('login.form') }}">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
