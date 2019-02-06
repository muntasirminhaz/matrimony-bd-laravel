@extends('layouts.users')


@section('content')



<div class="col-md-9 card">

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Changes not saved.</strong> . Please try again with valid information.
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
            <span class="h3 bold-text">Partner Preference Information</span>
            
        </div>
        <div class="panel-body">




            <div class="table-responsive show-userinfo">
                <table class="table table-light">
                    <tbody>

                    </tbody>
                </table>
            </div>

            @include('sections.edit-profile.partnerInsertFormMale')
           
 









        </div>
    </div>




</div>


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

        /
  professionArea($('#professionType').val());

        $('#professionType').on('click', function () {
            $(this).val()
            
        });
        function professionArea(id){
            $('#professionArea').val(0).hide();
            if()
        }
        
     /


    });

</script>
@endsection
