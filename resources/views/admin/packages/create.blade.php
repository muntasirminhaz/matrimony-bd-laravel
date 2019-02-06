@extends('adminlte::page')
@section('title', 'Add a new Package')

@section('content_header')
<h1>Add a new Package</h1>
@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form novalidate enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('admin.packages.store') }}">
                @csrf
    


                <div class="box-body">

                    <div class="form-group">
                        <label for="package_name" class="col-sm-2 control-label">
                            Package Name </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="package_name" name="package_name" placeholder="Add Package Name">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="package_price" class="col-sm-2 control-label">
                            Package Price </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="package_price" name="package_price" placeholder="Add Package Price">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="package_nrb_price" class="col-sm-2 control-label">
                            Package Nrb Price </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="package_nrb_price" name="package_nrb_price"
                                placeholder="Add Package Nrb Price">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="top_in_search" class="col-sm-2 control-label">
                            Top In Search </label>
                        <div class="col-sm-10">
                            <label for="top_in_search1">
                                <input required type="radio" value="1" id="top_in_search1" name="top_in_search">
                                &nbsp; Yes &nbsp;
                            </label>
                            &nbsp; &nbsp;&nbsp;&nbsp;
                            <label for="top_in_search2">
                                <input required type="radio" value="0" id="top_in_search2" name="top_in_search">
                                &nbsp; No &nbsp;    
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="post_photo" class="col-sm-2 control-label">
                            Post Photo </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="post_photo" name="post_photo" placeholder="Add Post Photo">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direct_contact_information" class="col-sm-2 control-label">
                            Direct Contact Information </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="direct_contact_information" name="direct_contact_information"
                                placeholder="Add Direct Contact Information">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="privacy_set" class="col-sm-2 control-label">
                            Privacy Set </label>
                        <div class="col-sm-10">
                            <label for="privacy_set1">
                                <input required type="radio" value="1" id="privacy_set1" name="privacy_set">
                                &nbsp; Yes &nbsp;
                            </label>
                            &nbsp; &nbsp;&nbsp;&nbsp;
                            <label for="privacy_set2">
                                <input required type="radio" value="0" id="privacy_set2" name="privacy_set">
                                &nbsp; No &nbsp;    
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="send_message" class="col-sm-2 control-label">
                            Send Message </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="send_message" name="send_message" placeholder="Add Send Message">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="daily_message" class="col-sm-2 control-label">
                            Daily Message </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="daily_message" name="daily_message" placeholder="Add Daily Message">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total_interest_express" class="col-sm-2 control-label">
                            Total Interest Express </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="total_interest_express" name="total_interest_express"
                                placeholder="Add Total Interest Express">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="daily_interest_express" class="col-sm-2 control-label">
                            Daily Interest Express </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="daily_interest_express" name="daily_interest_express"
                                placeholder="Add Daily Interest Express">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="interest_approve" class="col-sm-2 control-label">
                            Interest Approve </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="interest_approve" name="interest_approve"
                                placeholder="Add Interest Approve">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total_interest_approve" class="col-sm-2 control-label">
                            Total Interest Approve </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="total_interest_approve" name="total_interest_approve"
                                placeholder="Add Total Interest Approve">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="daily_interest_approve" class="col-sm-2 control-label">
                            Daily Interest Approve </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="daily_interest_approve" name="daily_interest_approve"
                                placeholder="Add Daily Interest Approve">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="send_profile" class="col-sm-2 control-label">
                            Send Profile </label>
                        <div class="col-sm-10">
                            <label for="send_profile1">
                                <input required type="radio" value="1" id="send_profile1" name="send_profile">
                                &nbsp; Yes &nbsp;
                            </label>
                            &nbsp; &nbsp;&nbsp;&nbsp;
                            <label for="send_profile2">
                                <input required type="radio" value="0" id="send_profile2" name="send_profile">
                                &nbsp; No &nbsp;    
                            </label>


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="add_favorite" class="col-sm-2 control-label">
                            Add Favorite </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="add_favorite" name="add_favorite" placeholder="Add Add Favorite">


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="most_favorite" class="col-sm-2 control-label">
                            Most Favorite </label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="most_favorite" name="most_favorite" placeholder="Add Most Favorite">


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="block_profile" class="col-sm-2 control-label">
                            Block Profile </label>
                        <div class="col-sm-10">
                            <label for="block_profile1">
                                <input required type="radio" value="1" id="block_profile1" name="block_profile">
                                &nbsp; Yes &nbsp;
                            </label>
                            &nbsp; &nbsp;&nbsp;&nbsp;
                            <label for="block_profile2">
                                <input required type="radio" value="0" id="block_profile2" name="block_profile">
                                &nbsp; No &nbsp;    
                            </label>


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="counselling" class="col-sm-2 control-label">
                            Counselling </label>
                        <div class="col-sm-10">
                            <label for="counselling1">
                                <input required type="radio" value="1" id="counselling1" name="counselling">
                                &nbsp; Yes &nbsp;
                            </label>
                            &nbsp; &nbsp;&nbsp;&nbsp;
                            <label for="counselling2">
                                <input required type="radio" value="0" id="counselling2" name="counselling" >
                                &nbsp; No &nbsp;    
                            </label>


                        </div>
                    </div>


                    <div class="form-group">
                        <label for="package_image" class="col-sm-2 control-label">Package Image</label>
                        <div class="col-sm-10">
                            <input required type="file" name="package_image" id="package_image">
                            <p class="help-block">Image for the Offer.</p>
                        </div>
                    </div>


                </div>




                <!-- /.box-body -->
                <div class="box-footer">
                    <a href='{{ route('admin.packages.index') }}' class="btn btn-default">Cancel Saving Package</a>
                    <button type="submit" class="btn btn-success pull-right">Save Package Now</button>    
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
@stop