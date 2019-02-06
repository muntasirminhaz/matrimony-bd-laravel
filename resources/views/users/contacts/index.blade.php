@extends('new.master')



@section('content')

<div class="col-sm-12 card">
    <!------View Normally------>
    <div class="panel panel-default">
        <div class="panel-heading title">
            <!--Add Parents Information-->
            @isset($headline)
            <span class="h3">{{ $headline }}</span>
            @else
            <span class="">Add headline</span>
            @endisset
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-4">

                    <ul class="list-group">
                        @foreach ($contacts as $contact)
                        @php
                        $name = $contact->first_name . ($contact->middle_name == '' ? ' ' .
                        $contact->last_name : $contact->middle_name . ' ' . $contact->last_name );
                        @endphp
                        <a href="{{ route('users.viewContact', $contact->contact_id) }}">
                            <li class="list-group-item
                        @isset($active)
                            @if($active == $contact->contact_id)
                                active
                            @endif                            
                        @endisset
                        ">
                       <div class="row">
                            <div class="col-xs-2">
                                    <img style="max-width: 40px" class="img-responsive"
                                    src="{{ url(\App\Common::getUserProfilePic($contact->contact_id)) }}" 
                                    alt="" srcset="">
                            </div>
    
                            <div class="col-xs-10">
    
                                <span class="text-left" style="min-height: 70px"> {{ $name }}</span>
                            </div>
                       </div>
                        
                    </li>
                        </a>
                        @endforeach                        
                    </ul>


                </div>
                <div class="col-sm-8">
                    @isset($active)

                    @php
                    $username = $user->first_name . ($user->middle_name == '' ? ' ' .
                        $user->last_name : $user->middle_name . ' ' . $user->last_name );
                        
                    @endphp

                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 20%" class="bg-warning">Name</td>
                                <td style="width: 80%" class="bg-yellow-active">{{ $username }}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="bg-warning">Mobile</td>
                                <td style="width: 80%" class="bg-yellow-active">{{ $user->mobile }}</td>
                            </tr>
                            <tr>
                                <td style="width: 20%" class="bg-warning">Email</td>
                                <td style="width: 80%" class="bg-yellow-active">{{ $user->email }}</td>
                            </tr>                            
                        </tbody>
                    </table>

                    @else
                    <p class="h2 text-center text-warning"> Click on any contact to view it's details.</p>

                    @endisset
                </div>
            </div>
        </div>

    </div>

</div>


@endsection
