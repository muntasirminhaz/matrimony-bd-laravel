@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row" style="margin-left: -30px;">
        <div class="col-sm-4">
            <div class="list-group">
                <button type="button" class="list-group-item mybtngrp">PARTNER SEARCH</button>
                <button type="button" class="list-group-item">Quick Search</button>
                <button type="button" class="list-group-item">Advanced Search</button>
                <button type="button" class="list-group-item">Photo Gallery Search</button>
                <button type="button" class="list-group-item">My Saved Searches</button>
                <button type="button" class="list-group-item">Search By Profile Id</button>
                <button type="button" class="list-group-item">Search By Community</button>
                <button type="button" class="list-group-item">My Match Alerts</button>
                <button type="button" class="list-group-item">Who's Online</button>
            </div>
            <div class="list-group">
                <button type="button" class="list-group-item mybtngrp">QUICK LINKS</button>
                <button type="button" class="list-group-item">My Profile and Account</button>
                <button type="button" class="list-group-item">Partner Search</button>
                <button type="button" class="list-group-item">Communicate</button>
                <button type="button" class="list-group-item">My Reports</button>
                <button type="button" class="list-group-item">Help</button>
                <button type="button" class="list-group-item">Love, Relationships and Marriage</button>
                <button type="button" class="list-group-item">Report Misuse</button>
                <button type="button" class="list-group-item">Logout</button>
            </div>
        </div>
        <div class="col-sm-8">

            <div class="row">
                <div class="col-sm-6">

                    <div class="row xyz">
                        <div class="col-sm-4 myleftstyle-dem">
                            <span style="color: green;">sumaira</span><br />
                            <img src="{{ asset('assets/template/img/dp.jpg') }}" alt="Girl in a jacket" width="85"
                                height="150">
                        </div>
                        <div class="col-sm-8 myrightstyle-dem" style="">
                            <span><b>Age:</b> 31 yrs</span>
                            <span><b>Height:</b> 5ft 2 in - 157 cm</span>
                            <span><b>Religion:</b> Muslim, Urdu</span>
                            <span><b>Sect:</b> Sunni</span><br />
                            <span><b>Education:</b> Masters - biochemistry</span><br />
                            <span><b>Occupation:</b> Not Working</span>
                            <span><b>Residing in:</b> karachi, sindh, Pakistan</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">

                    <div class="row xyz">
                        <div class="col-sm-4 myleftstyle-dem">
                            <span style="color: green;">sumaira</span><br />
                            <img src="{{ asset('assets/template/img/dp.jpg') }}" alt="Girl in a jacket" width="85"
                                height="150">
                        </div>
                        <div class="col-sm-8 myrightstyle-dem" style="">
                            <span><b>Age:</b> 31 yrs</span>
                            <span><b>Height:</b> 5ft 2 in - 157 cm</span>
                            <span><b>Religion:</b> Muslim, Urdu</span>
                            <span><b>Sect:</b> Sunni</span><br />
                            <span><b>Education:</b> Masters - biochemistry</span><br />
                            <span><b>Occupation:</b> Not Working</span>
                            <span><b>Residing in:</b> karachi, sindh, Pakistan</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
