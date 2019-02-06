@extends('layouts.app')




@section('content')

<div class="container">

    <div class="row">
        <div class="col-xs-12 margin-top-10">

            <div class="jumbotron">
                <div class="container">
                    <h1>Your Email is Not Verified !!</h1>
                    <p>Your email is not verified, please check your inbox and verify your account now.</p>
                    <p>
                        <a href="{{ route('sendMailAgain') }}?sendmail=1" class="btn btn-primary btn-lg"
                            @isset($mailJustSend){!! 'id="mailJustSend"' !!}@endisset>
                        I did not received my verification email yet.    
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@isset($mailJustSend)
@section('footerscript')
<script>
    $(document).ready(function () {
        $('#mailJustSend').hide();
    });
    setTimeout(function () {
        $(function () {
            $('#mailJustSend').show(300)
        });
    }, 60000);
</script>
@endsection
@endisset
