@extends('new.master')


@section('content')
<div class="container margin-50">
    <div class="row">
        <div class="col-xs-12">
                @if(session('danger'))
                <div class="alert alert-danger text-center" role="alert">                   
                    <strong>{!! session('danger') !!}</strong>
                </div>
                @endif
                @if(session('info'))
                <div class="alert alert-info text-center" role="alert">                   
                    <strong>{!! session('info') !!}</strong>
                </div>
                @endif
        </div>
    </div>
        
</div>

<div class="container margin-50">
    <div class="row padding-0">
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
        <div class="col-md-8 col-sm-12 center-block bg-warning ">

            <h1 class="center-block margin-0-auto text-align-center padding-top-20">Login</h1>
            <hr>

            <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}"
                role="form" novalidate="">
                @csrf

                <div class="form-group row">

                    <div class="col-sm-6">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required autofocus>
        
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                    </div>
                    <div class="col-sm-6">

                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>
        
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                    </div>
                    
                    
                </div>

                <div class="form-group row">
                    <div class="col-xs-12">
                        <button type="submit" class="signupbutton btn btn-large btn-block btn-success" id="login">Login</button>
                    </div>
                    <div class="col-xs-12 text-align-center">
                        <br>
                            <small><a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                </small>
                    </div>
                </div>


            </form>

        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>



@endsection
