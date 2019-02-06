@extends('layouts.app')

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

            <h1 class="center-block margin-0-auto text-align-center padding-top-20">{{ __('Reset Password') }}</h1>
            <hr>



                <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>


        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>



@endsection
