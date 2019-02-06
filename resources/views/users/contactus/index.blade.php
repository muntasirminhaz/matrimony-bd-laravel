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

            <h1 class="center-block margin-0-auto text-align-center padding-top-20">Contact Us</h1>
            <hr>


            <form action="{{ route('sendContactMessage') }}" method="POST" role="form">
@csrf
                <div class="form-group">
                    <label for="myname">Name</label>
                    <input type="text" class="form-control" name="myname" id="myname" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="myemail">Name</label>
                    <input type="email" class="form-control" name="myemail" id="myemail" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="mymessage">Name</label>

                    <textarea name="mymessage" id="input" name="mymessage" class="form-control" rows="3" required></textarea>

                </div>



                <button type="submit" class="btn btn-block btn-success">Send Message</button>
            </form>




        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>



@endsection
