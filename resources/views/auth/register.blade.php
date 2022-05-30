@extends('layouts.userLayout')

@section('content')
<div class="container">
    <a class="btn btn-secondary" href="/">Go Back</a> <br> <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('REGISTER (STEP ONE)') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->
                            <div class="col-md-4 mb-3">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" placeholder="Surname" name="lname" value="{{ old('lname') }}" required  autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" placeholder="Firstname" name="fname" value="{{ old('fname') }}" required  autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" placeholder="Othername" name="mname" value="{{ old('mname') }}"  autofocus>

                                @error('mname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-4 mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <input id="phoneno" type="number" class="form-control @error('phoneno') is-invalid @enderror" placeholder="Phone number" name="phoneno" value="{{ old('phoneno') }}" required autocomplete="phoneno">

                                @error('phoneno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">

                                    <select class="form-control" name="reg_type" id="" required>
                                        <option value="">-- Registration Type--</option>
                                        <option value="volunteer">Volunteer</option>
                                        <option value="delegate">Delegate</option>
                                    </select>

                            </div>
                        </div>

                          <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg">
                                    {{ __('Continue') }} <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
