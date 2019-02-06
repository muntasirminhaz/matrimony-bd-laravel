@extends('layouts.users')


@section('content')



<div class="col-md-9 card">

    
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Changes Not Saved.</strong> . Please try again with valid information.
        </div>
        @endif
    
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ session('error') }}</strong> Please try again with valid information.
        </div>
        @endif
    
        @if(Session('msg'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong> {{ Session('msg') }}</strong>
        </div>
        @endif
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong> {{ Session('success') }}</strong>
        </div>
        @endif

    <div class="panel panel-default">
        <div class="panel-heading title">
            <span class="h3 bold-text">Siblings Information</span>

          
                
            

            @isset($insertSiblingsForm)    

            @if ($insertSiblingsForm->has_siblings < 1 )
            <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#howmnySibliModal">
                Do you have Siblings ???
            </button>
            @else
            <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addSibliModal">Add
                sibling</button>
            @endif            

            @endisset
          





        </div>
        <div class="panel-body">

            <!------------------------------------------------------------->

            @isset($insertSiblingsForm)    

            @if ($insertSiblingsForm->has_siblings > 0)
                <p>You have to insert your siblings information. Make sure you have added information of all your siblings.</p>
            @else
                <p>You infomred that you have no siblings.</p>
            @endif
            

            @else
            <p>Please add siblings information.</p>
            @endif


            @isset($insertSiblingsForm) 
            
           
            @if ($insertSiblingsForm->has_siblings == 1 )

            @forelse ($mySiblings as $item)


            <div class="table-responsive">
                <table class="table table-light">
                    <tbody>
                        <tr>
                            <th colspan="2">
                                <span class="pull-left bold-text">
                                        {{ $item->living_status == 2 ? 'Late ' : '' }}
                                        {{ $item->siblings_name }}</span>
                                <span class="pull-right">
                                    <span class="btn btn-danger btn-xs" data-toggle="modal" href="#delete-{{ $item->id }}">Delete</span>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                Siblings Gender
                            </td>
                            <td>
                                {{ gender($item->gender) }}
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                                Profession
                            </td>
                            <td>
                                {{ $item->sibling_profession != '' ? professionType($item->sibling_profession) :
                                'Un-employed' }}
                            </td>
                        </tr>


                        @if($item->sibling_profession)
                        <tr>
                            <td>
                                Designation
                            </td>
                            <td>
                                {{ $item->sibling_designation }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Organization Name
                            </td>
                            <td>
                                {{ $item->sibling_organization }}
                            </td>
                        </tr>
                        @endif

                        <tr>
                            <td>
                                Marital Status
                            </td>
                            <td>
                                {{ marriedYesNo($item->marital_status) }}
                            </td>
                        </tr>


                        @if ($item->marital_status == 2)


                        <tr>
                            <td>
                                Spouse Name
                            </td>
                            <td>
                                    {{ $item->spouse_living_status == 2 ? 'Late ' : '' }} {{ $item->spouse_name }}
                            </td>
                        </tr>
                 

                        @if ($item->spouse_living_status == 2 )


                        <tr>
                            <td>
                                Spouse Profession
                            </td>
                            <td>
                                {{ $item->spouse_profession != '' ? professionType($item->sibling_profession) :
                                'Un-employed' }}

                            </td>
                        </tr>

                        @if($item->spouse_profession)


                        <tr>
                            <td>
                                Designation
                            </td>
                            <td>
                                {{ $item->spouse_designation }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Organization Name
                            </td>
                            <td>
                                {{ $item->spouse_organization }}
                            </td>
                        </tr>
                        @endif

                        @endif

                        @endif

                    </tbody>
                </table>
            </div>


            <div class="modal fade" id="delete-{{ $item->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Delete : </h4>
                        </div>
                        <form action="{{ route('users.editprofile.siblings.delete',$item->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="sliblingsid" value="{{ $item->id }}">
                                <p>Are you sure?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Edit</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            @empty
            <p>Please add siblings information</p>
            @endforelse
            @endif
            @endisset


            <!---------------------------------------Modal Start here For-------------------------------------->
            <!-- Trigger the modal with a button -->
            <!-- Modal -->
            <div id="howmnySibliModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Siblings Details</h4>
                        </div>
                        <form method="POST" action="{{ route('users.editprofile.siblings.hasSiblings') }}" class="padding-0-30">
                            @csrf
                        <div class="modal-body">
                                <div class="form-group row">
                                    <label for="hassiblings" class="col-md-4 col-form-label">Do you have Siblings?
                                    </label>
                                    <div class="col-md-8">
                                        <input required value="0" type="radio" name="hassiblings"
                                            id="IdradioSib" /> No
                                        <input required value="1" type="radio" name="hassiblings"
                                            id="IdradioSib" /> Yes
                                        @if ($errors->has('hassiblings'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('hassiblings') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-default">Save Changes</button>
                        </div>
                    </form>
                    </div>

                </div>
            </div>
            <!--modal end div-->

            <!---------------------------------------Modal End here For-------------------------------------->


            <!---------------------------------------Normal View-------------------------------------->




        </div>
    </div>

</div>
<!--added extra div for footer-->


</div>



@isset($insertSiblingsForm)    

@if ($insertSiblingsForm->has_siblings == 1 )

<div id="addSibliModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Siblings Information</h4>
            </div>
            <div class="modal-body">
                <!---Modal body--->
                <div id="" style="display:">
                    <!----if More siblings-div -->
                    <!---------Siblings Form started--------------->
                    <form method="POST" action="{{ route('users.editprofile.siblings.insert') }}" class="padding-0-30">
                        @csrf
                        <!--DivPossition  start for hide against of radio button -->
                        <div class="form-group row">
                            <label for="sibling_position" class="col-md-4 col-form-label">Siblings Position*
                            </label>
                            <div class="col-md-8">
                                <input  class="form-control" type="number" name="sibling_position" id="sibling_position">                               
                                @if ($errors->has('sibling_position'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('sibling_position') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sibgender" class="col-md-4 col-form-label">Siblings is:*
                            </label>
                            <div class="col-md-8">
                                <input value="1" type="radio" name="sibgender" class="classsibgender" id="idsibgender" />
                                Brother
                                <input value="2" type="radio" name="sibgender" class="classsibgender" id="idsibgender" />
                                Sister
                                @if ($errors->has('sibgender'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('sibgender') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div id="DivPossitionhide" style="display:">
                            <div class="form-group row">
                                <label for="silname" class="col-md-4 col-form-label">Siblings Name*

                                </label>
                                <div class="col-md-8">
                                    <input value="" id="silname" name="silname" placeholder="Siblings Name" class="form-control here"
                                        type="text">
                                    @if ($errors->has('silname'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('silname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sibLivStatus" class="col-md-4 col-form-label">Living Status*

                                </label>
                                <div class="col-md-8">
                                    <input type="radio" name="sibLivStatus" id="sibLivStatus" value="1" class="classSibLivStatus" />
                                    Alive
                                    <input type="radio" name="sibLivStatus" id="sibLivStatus" value="2" class="classSibLivStatus" />
                                    Passed Away
                                    @if ($errors->has('sibLivStatus'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sibLivStatus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!----------------------------------------------------------->
                            <div id="sibhidpro" style="display:">
                                <div id="HidDivSibLiv" style="display:none">
                                    <!-----Starting siblings Living Aagainst radio button------>
                                    <div class="form-group row">
                                        <label for="sibprofession" class="col-md-4 col-form-label">Profession*

                                        </label>
                                        <div class="col-md-8">
                                            <select name="sibprofession" id="sibprofession" class="form-control"">
                                                        <option value="
                                                0">Select One</option>
                                                @foreach (professionType() as $key=>$value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('sibprofession'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sibprofession') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="sibdesignation" class="col-md-4 col-form-label">Designation*

                                        </label>
                                        <div class="col-md-8">
                                            <input value="" id="sibdesignation" name="sibdesignation" placeholder="Designation"
                                                class="form-control here" type="text">
                                            @if ($errors->has('sibdesignation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sibdesignation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="siborgname" class="col-md-4 col-form-label">Organization Name*

                                        </label>
                                        <div class="col-md-8">
                                            <input value="" id="siborgname" name="siborgname" placeholder="Organization Name"
                                                class="form-control here" type="text">
                                            @if ($errors->has('siborgname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('siborgname') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <!-----End-siblings Living Aagainst radio button--------->
                                <!----------------------------------------------------------->

                                <div class="form-group row">
                                    <label for="maritalStatus" class="col-md-4 col-form-label">Marital Status*

                                    </label>
                                    <div class="col-md-8">
                                        <input type="radio" name="maritalStatus" id="maritalStatus" value="1" class="classmaritalStatus" />Single
                                        <input type="radio" name="maritalStatus" id="maritalStatus" value="2" class="classmaritalStatus" />
                                        Married
                                        @if ($errors->has('maritalStatus'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('maritalStatus') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!------------------------------------------>
                                <div id="SpaousDivHide" style="display:none">
                                    <div class="form-group row">
                                        <label for="sibSpouseName" class="col-md-4 col-form-label">Spouse Name*

                                        </label>
                                        <div class="col-md-8">
                                            <input value="" id="sibSpouseName" name="sibSpouseName" placeholder="Spouse Name"
                                                class="form-control here" type="text">
                                            @if ($errors->has('sibSpouseName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sibSpouseName') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-------------*****----------->
                                    <div class="form-group row">
                                        <label for="SpouseLivStatus" class="col-md-4 col-form-label">Spouse Living
                                            Status*

                                        </label>
                                        <div class="col-md-8">
                                            <input type="radio" name="SpouseLivStatus" id="SpouseLivStatus" value="1"
                                                class="classSpouseLivStatus" /> Alive
                                            <input type="radio" name="SpouseLivStatus" id="SpouseLivStatus" value="2"
                                                class="classSpouseLivStatus" /> Passed Away
                                            @if ($errors->has('SpouseLivStatus'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('SpouseLivStatus') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- </div><!---End-If spouse is Live.then this div is show/hide---->
                                    <!-------------*****##@------>
                                    <div id="spouseDivAlive" style="display:none">
                                        <!---Div Start if is live Spouse---->
                                        <div class="form-group row">
                                            <label for="Spouseprofession" class="col-md-4 col-form-label">Spouse
                                                Profession*

                                            </label>
                                            <div class="col-md-8">
                                                <select name="Spouseprofession" id="Spouseprofession" class="form-control"">
                                                        <option value="
                                                    0">Select One</option>
                                                    @foreach (professionType() as $key=>$value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('Spouseprofession'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Spouseprofession') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="Spousedesignation" class="col-md-4 col-form-label">Designation*

                                            </label>
                                            <div class="col-md-8">
                                                <input value="" id="Spousedesignation" name="Spousedesignation"
                                                    placeholder="Designation" class="form-control here" type="text">
                                                @if ($errors->has('Spousedesignation'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Spousedesignation') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Spouseorgname" class="col-md-4 col-form-label">Organization
                                                Name*

                                            </label>
                                            <div class="col-md-8">
                                                <input value="" id="Spouseorgname" name="Spouseorgname" placeholder="Organization Name"
                                                    class="form-control here" type="text">
                                                @if ($errors->has('Spouseorgname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Spouseorgname') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                    <!---Div End if is live Spouse---->
                                </div>
                                <!---End-If spouse is Live.then this div is show/hide---->
                            </div>
                            <!--DivPossition  end for hide against of radio button  -->

                        </div>
                        <!--------------------------------------------------------------------------------------------------------------->
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-large btn-block btn-success" name="" value="Submit" />
                            </div>
                        </div>
                    </form>
                </div>
                <!----if more siblings div hide is end----->
                <!---sibling form is end--->
            </div>
            <!---Modal body end--->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endif            

@endisset
<!---------------------------------------Add siblings Modal is end Here-------------------------------------->
<!------------------------------------------------------------------------------------->
<!------------------Edit Siblings Modal Start here--------------------->
<div id="sibEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                Edit Siblings Information
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!------------------------------------------------------------------------------------->

@endsection




@section('sidebar')
<div class="col-md-3 ">

    @include('sections.sidebarprofileedit')
</div>
@endsection

@section('title')
<h1>Update Profile and Settings</h1>
@endsection


@section('footerscript')
<script>
    $(function () {
        $('#toggle-form').on('click', function () {
            $('.show-userinfo').toggle(300);
            $('.show-form').toggle(300);

            $(this).toggleClass('btn-danger');
            $(this).toggleClass('btn-info');

            if ($('#toggle-form .edit-text').text() == 'Edit') {
                $('#toggle-form .edit-icon').removeClass('fa-edit');
                $('#toggle-form .edit-icon').addClass('fa-window-close');
                $('#toggle-form .edit-text').text('Cancel Edit');
            } else {
                $('#toggle-form .edit-icon').removeClass('fa-window-close');
                $('#toggle-form .edit-icon').addClass('fa-edit');

                $('#toggle-form .edit-text').text('Edit');
            }

        });
    });


    $(document).ready(function () {
        $('.ClassradioSib').click('change', function () {
            // alert($(this).val());
            if ($(this).val() != 2) {
                $('#DivHavSibHid').show(300);
            } else {
                $('#DivHavSibHid').hide(300)
            }
        });
    })
    //----------------------------------------------
    //class="classSibLivStatus id="HidDivSibLiv"
    $(document).ready(function () {
        $('.classSibLivStatus').click('change', function () {
            if ($(this).val() != 1) {
                $('#HidDivSibLiv').hide(300);
            } else {
                $('#HidDivSibLiv').show(300);
            }
        })
    })
    //-----------------------------------------
    $(document).ready(function () {
        $('.classmaritalStatus').click('change', function () {
            // alert($(this).val());
            if ($(this).val() != 2) {
                $('#SpaousDivHide').hide(300);
            } else {
                $('#SpaousDivHide').show(300);
            }
        })
    })
    //--------------------------------------
    //classSpouseLivStatus id= spouseDivAlive

    $(document).ready(function () {
        $('.classSpouseLivStatus').click('change', function () {
            //alert($(this).val());
            if ($(this).val() != 2) {
                $('#spouseDivAlive').show(300);
            } else {
                $('#spouseDivAlive').hide(300);
            }
        })
    })

</script>
@endsection
