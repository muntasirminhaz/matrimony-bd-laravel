@extends('new.master')

@section('content')
    <!--Main Content Start -->
<div class="container">
        <div class="row">
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
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th class="mythead" colspan="5">{{ $user->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width=''>Age & Gender</td>
                            <td width=''>:</td>
                            <td width=''>{{ $user->age }}, {{ $user->gender }}</td>
                            <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt=""> Express
                                Interest</td>
                            <td rowspan="6"><img src="{{ url($photo) }}" alt="" height="199" width="148"></img></td>
                        <tr>
                            <td width=''>Maritial Status</td>
                            <td width=''>:</td>
                            <td width=''>{{ $user->marital_status }}</td>
                            <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt=""> Contact
                                Details</td>
                        </tr>
                        <tr>
                            <td width=''>Height</td>
                            <td width=''>:</td>
                            <td width=''>{{ height($user->height) }}</td>
                            <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt=""> Send a
                                Messsage</td>
                        </tr>
                        <tr>
                            <td width=''>Education</td>
                            <td width=''>:</td>
                            <td width=''>{{ $user->education_level ?? ' - ' }}</td>
                            <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt=""> Add to
                                Favourites</td>
                        </tr>
                        <tr>
                            <td width=''>Occupation</td>
                            <td width=''>:</td>
                            <td width=''>{{ $user->user_profession_type }}</td>
                            <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt=""> Email to a
                                Friend</td>
                        </tr>
                        <tr>
                            <td width=''>Location</td>
                            <td width=''>:</td>
                            <td width=''>{{ $user->location_district }}, {{ $user->location_living_city }}, {{
                                $user->location_living_country }}</td>
                            <td width=''><img src="{{ asset('assets/template/img/img_arrow.gif') }}" alt=""> Print this
                                Profile</td>
                        </tr>
                    </tbody>
                </table>
    
    
    
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Basic Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Age</b></td>
                            <td width='25%'>{{ \App\Common::getAge($user->date_of_birth) }}</td>
                            <td width='25%'><b>Blood Group</b></td>
                            <td width='25%'>{{ bloodGroups($user->blood_group) }}</td>
                        <tr>
                            <td width='25%'><b>Height</b></td>
                            <td width='25%'>{{ $user->height }}</td>
                            <td width='25%'><b>Skin Tone</b></td>
                            <td width='25%'>{{ skintone($user->skin_tone) }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Weight</b></td>
                            <td width='25%'>{{ $user->weight }}</td>
                            <td width='25%'><b>Body Type</b></td>
                            <td width='25%'>{{ bodytype($user->body_type) }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Maritial Status</b></td>
                            <td width='25%'>{{ maritalstatus($user->marital_status) }}</td>
                            <td width='25%'><b>Personal Value</b></td>
                            <td width='25%'>{{ '---'}}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Children have</b></td>
                            <td width='25%'>{{ $user->how_many_children == 0 ? 'None' : $user->how_many_children }}</td>
                            <td width='25%'><b>Disability</b></td>
                            <td width='25%'>{{ $user->disability == 1 ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Number of children</b></td>
                            <td width='25%'>{{ $user->how_many_children == 0 ? 'None' : $user->how_many_children }}</td>
                            <td width='25%'><b>Description</b></td>
                            <td width='25%'>{{ "---"}}</td>
                        </tr>
                    </tbody>
                </table>
    
    
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Education & Career</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Highest Education(in study/ completed)</b></td>
                            <td width='25%'>{{ educationLevel($education->education_level) }}</td>
                            <td width='25%'><b>Profession</b></td>
                            <td width='25%'>{{ \App\Common::professionDetails($user->user_profession_type,
                                $user->user_profession_details) }}</td>
                        <tr>
                            <td width='25%'><b>Graduation(Subject/Area)</b></td>
                            <td width='25%'>{{ educationArea($education->education_area)}}</td>
                            <td width='25%'><b>Designation</b></td>
                            <td width='25%'>{{ $user->user_designation }}</td>
                        </tr>
    
                        <tr>
                            <td width='25%'><b>Graduated From</b></td>
                            <td width='25%'>{{ $education->institution_name}}</td>
                            <td width='25%'><b>Organization</b></td>
                            <td width='25%'>{{ $user->user_org_name }}</td>
                        </tr>
                    </tbody>
                </table>
    
    
    
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Home/ancestor or District</b></td>
                            <td width='25%'>{{ \App\Common::district($user->location_district) }}</td>
                            <td width='25%'><b>Family Residence Area/City</b></td>
                            <td width='25%'>{{ $user->location_family_living_area }}</td>
                        <tr>
                            <td width='25%'><b>Home Upazilla/Thana</b></td>
                            <td width='25%'>{{ \App\Common::upzila($user->location_upzila) }}</td>
                            <td width='25%'><b>Family Residence status</b></td>
                            <td width='25%'>{{ $user->location_family_residential_status > 0 ?
                                residentialStatus($user->location_family_residential_status) : '' }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Living city/area</b></td>
                            <td width='25%'>{{ $user->location_living_city }}</td>
                            <td width='25%'><b>Area Post Code</b></td>
                            <td width='25%'>{{ $user->location_family_zip }}</td>
                        </tr>
                    </tbody>
                </table>
    
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Immigration/NRB Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Residence Country</b></td>
                            <td width='25%'>{{ $user->location_living_country }}</td>
                            <td width='25%'><b>Living state/city</b></td>
                            <td width='25%'>{{ $user->location_living_city }}</td>
                        <tr>
                            <td width='25%'><b>Grown up country</b></td>
                            <td width='25%'>{{ $user->location_growing_up_country }}</td>
                            <td width='25%'><b>Immigration status</b></td>
                            <td width='25%'>{{ $user->location_immigration_status > 0 ?
                                immigrationStatus($user->location_immigration_status) : '' }}</td>
    
                        </tr>
    
                    </tbody>
                </table>
    
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Religion and Others</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Religion</b></td>
                            <td width='25%'>{{ religion($user->religion) }}</td>
                            <td width='25%'><b>Mother Tongue</b></td>
                            <td width='25%'>{{ motherTongue($user->language) }}</td>
                        <tr>
                            <td width='25%'><b>Sub caste</b></td>
                            <td width='25%'>{{ '---' }}</td>
                            <td width='25%'><b>Personal Values</b></td>
                            <td width='25%'>{{ '---' }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Diet</b></td>
                            <td width='25%'>{{ $user->diet_type }}</td>
                            <td width='25%'><b>Sun Sign</b></td>
                            <td width='25%'>{{ sunsign($user->sun_sign) }}</td>
                        </tr>
    
                        <tr>
                            <td width='25%'><b>Drink</b></td>
                            <td width='25%'>{{ drink($user->drink) }}</td>
                            <td width='25%'><b>Hobby</b></td>
                            <td width='25%'>{{ $user->hobby }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Smoke</b></td>
                            <td width='25%'>{{ smoke($user->smoke) }}</td>
                            <td width='25%'><b>Annual Income</b></td>
                            <td width='25%'>{{ $user->annual_income }} Taka</td>
                        </tr>
                    </tbody>
                </table>
    
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Religious activities for Muslims</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Namaz/Religious Activities</b></td>
                            <td width='25%'>{{ '---' }}</td>
                            @if ($user->gender == 2)
                            <td width='25%'><b>Hijab/nikab Wearing</b></td>
                            <td width='25%'>{{ $user->wear_hijab }}</td>
                            @endif
                        <tr>
                            <td width='25%'><b>Ramadan (fasting)</b></td>
                            <td width='25%'>{{ '---' }}</td>
                            <td width='25%'><b>Borka Wearing</b></td>
                            <td width='25%'>{{ '---' }}</td>
                        </tr>
    
                    </tbody>
                </table>
    
                {{-- Family --}}
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Parents Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Father</b></td>
                            <td width='25%'>{{ $user->father_name }}</td>
                            <td width='25%'><b>Mother</b></td>
                            <td width='25%'>{{ $user->mother_name }}</td>
                        <tr>
                            <td width='25%'><b>Living Status</b></td>
                            <td width='25%'>{{ deadOrAlive($user->father_living_status) }}</td>
                            <td width='25%'><b>Living Status</b></td>
                            <td width='25%'>{{ deadOrAlive($user->mother_living_status) }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Service Status</b></td>
                            <td width='25%'>{{ serviceStatus($user->father_service_status) }}</td>
                            <td width='25%'><b>Service Status</b></td>
                            <td width='25%'>{{ serviceStatus($user->mother_service_status) }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Profession</b></td>
                            <td width='25%'>{{ professionType($user->father_profession) }}</td>
                            <td width='25%'><b>Profession</b></td>
                            <td width='25%'>{{ professionType($user->mother_profession) }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Designation</b></td>
                            <td width='25%'>{{ $user->father_designation }}</td>
                            <td width='25%'><b>Designation</b></td>
                            <td width='25%'>{{ $user->mother_designation }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Organigation Name</b></td>
                            <td width='25%'>{{ $user->father_organization_name }}</td>
                            <td width='25%'><b>Organigation Name</b></td>
                            <td width='25%'>{{ $user->mother_organization_name }}</td>
                        </tr>
                    </tbody>
                </table>
    
                {{-- Family --}}
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Family Background</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Family Value</b></td>
                            <td width='25%'>{{ $user->id }}</td>
    
                            <td width='25%'><b>Annual Income</b></td>
                            <td width='25%'>{{ $user->annual_income }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Family Status</b></td>
                            <td width='25%'>{{ '' }}</td>
    
                            <td width='25%'><b>Income Soruces</b></td>
                            <td width='25%'>{{ '' }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Have any Land/Flat ins Dhaka or nearby City</b></td>
                            <td width='25%'>
                                {{ $user->have_land == 2 ? 'Yes (' . str_ireplace('|', ', ', $user->land_type) . ')' :
                                'No'}}
                            </td>
    
                            <td width='25%'><b>Property Description </b></td>
                            <td width='25%'> {{ $user->have_land == 2 ? 'Yes (' . str_ireplace('|', ', ', $user->land_type)
                                . ')' : 'No'}}</td>
                        </tr>
                    </tbody>
                </table>
    
                {{-- Brother and Sister --}}
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Brother and Sister</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='25%'><b>Number of Brother</b></td>
                            <td width='25%'>{{ $user->number_of_brothers }}</td>
                            <td width='25%'><b>Number of Sister</b></td>
                            <td width='25%'>{{ $user->number_of_sisters }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Of whom Married</b></td>
                            <td width='25%'>{{ $user->number_of_brother_married }}</td>
    
                            <td width='25%'><b>Of whom Married</b></td>
                            <td width='25%'>{{ $user->number_of_sisters_married }}</td>
                        </tr>
                        {{-- If use have Brother and Sister --}}
                        @if ($user->number_of_sisters > 0 || $user->number_of_brothers > 0)
    
                        <tr>
                            <th colspan="4" class="mythead">Description</th>
                        </tr>
                        @foreach ($siblings as $sibling)
    
                        <tr>
                            <td class="mytd" colspan="4"><b>{{ $sibling->gender == 1 ? 'Brother ' : 'Sister ' }} {{
                                    $sibling->sibling_profession --}}</b></td>
                        </tr>
    
                        <tr>
                            <td width='25%'><b>Education Level</b></td>
                            <td width='25%'>{{ ' --- ' }}</td>
                            <td width='25%'><b>Institution</b></td>
                            <td width='25%'>{{ ' --- ' }}</td>
                        </tr>
    
                        <tr>
                            <td width='25%'><b>Profession</b></td>
                            <td width='25%'>{{ professionType($sibling->sibling_profession) }}</td>
                            <td width='25%'><b>Designation</b></td>
                            <td width='25%'>{{ $sibling->sibling_designation }}</td>
    
                        </tr>
                        <tr>
                            <td colspan="2"><b>Organization</b></td>
                            <td colspan="2">{{ $sibling->sibling_organization }}</td>
                        </tr>
                        @if ($sibling->marital_status == 1)
                        <tr>
                            <td width='25%'><b>Spouse' Profession</b></td>
                            <td width='25%'>{{ professionType($sibling->sibling_spouse_profession) }}</td>
                            <td width='25%'><b>Designation</b></td>
                            <td width='25%'>{{ $sibling->sibling_spouse_designation }}</td>
                        </tr>
                        @endif
    
                        @endforeach
    
                        @endif
    
                    </tbody>
                </table>
    
                @if ($user->preference_provided > 0)
    
                {{-- Partner Preference --}}
                <table class="table table-condensed rounded mytable">
                    <thead>
                        <tr>
                            <th colspan="4" class="mythead">Parnet Preference</th>
                        </tr>
                    </thead>
                    <tbody>
    
                        <tr>
                            <td class="mytd" colspan="4"><b>Basic Informaiton</b></td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Age</b></td>
                            <td width='25%'>{{ $user->preference_min_age }} - {{ $user->preference_max_age }}</td>
    
                            <td width='25%'><b>Marital Status</b></td>
                            <td width='25%'>{{ $user->preference_marital_status }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Height</b></td>
                            <td width='25%'>{{ $user->preference_height }}</td>
    
                            <td width='25%'><b>Children Allow</b></td>
                            <td width='25%'>{{ $user->preference_children_allow }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Religion</b></td>
                            <td width='25%'>{{ $user->preference_religion }}</td>
    
                            <td width='25%'><b>Skin Tone</b></td>
                            <td width='25%'>{{ $user->preference_skintone }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Sub Caste</b></td>
                            <td width='25%'>{{ "---" }}</td>
    
                            <td width='25%'><b>Body Type</b></td>
                            <td width='25%'>{{ $user->preference_body_type }}</td>
                        </tr>
                        <tr>
                            <td class="mytd" colspan="4"><b>Location Details</b></td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Current Living Country</b></td>
                            <td width='25%'>{{ $user->preference_living_country }}</td>
    
                            <td width='25%'><b>Family Residence Area/City</b></td>
                            <td width='25%'>{{ $user->preference_family_resident_city }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Current Living City</b></td>
                            <td width='25%'>{{ $user->preference_living_country }}</td>
    
                            <td width='25%'><b>Residence Status</b></td>
                            <td width='25%'>{{ $user->preference_family_residential_status }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Expected Home District</b></td>
                            <td colspan="3">{{ $user->preference_home_district }}</td>
                        </tr>
                        <tr>
                            <td class="mytd" colspan="4"><b>Education &amp; Career</b></td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Education Level</b></td>
                            <td width='25%'>{{ $user->preference_education }}</td>
    
                            <td width='25%'><b>Profession</b></td>
                            <td width='25%'>{{ $user->preference_profession }}</td>
                        </tr>
    
    
                        <tr>
                            <td class="mytd" colspan="4"><b>Lifestype &amp; family</b></td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Family Value</b></td>
                            <td width='25%'>{{ $user->id }}</td>
    
                            <td width='25%'><b>Diet</b></td>
                            <td width='25%'>{{ "---"}}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Family Status</b></td>
                            <td width='25%'>{{ "---" }}</td>
    
                            <td width='25%'><b>Smoke</b></td>
                            <td width='25%'>{{ "---" }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Monthy Income</b></td>
                            <td width='25%'>{{ $user->preference_monthly_income }}</td>
    
                            <td width='25%'><b>Drink</b></td>
                            <td width='25%'>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td width='25%'><b>Disablity</b></td>
                            <td width='25%'>{{ $user->preference_disability }}</td>
    
                            <td width='25%'><b>NRB Prefered</b></td>
                            <td width='25%'>{{ $user->preference_nrb }}</td>
                        </tr>
    
                    </tbody>
                </table>
                @endif
    
    
            </div>
    
        </div>
    </div>
    
    
    <!--Footer-->
    
@endsection