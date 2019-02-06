@extends('new.master')

@section('content')
<div class="profileSection">
    <div class="container">
        <div class="row margin-top-10">

            <div class="col-sm-1 hidden-xs">
            </div>
            <div class="col-sm-10">
                <h1>
                    My Current Package Details /
                </h1>
                <hr>
                <table class="table table-striped table-responsive">
                    <tbody>
                        <tr>
                            <th sty le="width: 35%">
                                Criteria </th>
                               <th style="width: 65%"  class="bold-text">
                                Details
                            </th>
                        </tr>
                          <tr>
                            <td style="width: 35%">
                                Package Start Date </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->package_start_date }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Package End Date </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->package_end_date }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Package Active Days </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->package_active_days }} Days
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Top In Search </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->top_in_search == 1 ? 'Yes' : 'No' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Post Photo </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->post_photo }} Photos
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Direct Contact Information </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->direct_contact_information }} Contacts
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Set Privacy </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->privacy_set == 1 ? 'Yes; privacy can be set.' : 'No; privacy cannot be set. (Upgrade membership)' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Send Message </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->send_message }} Messages Total
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Daily Message </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->daily_message }} Messages Daily
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Total Interest Express </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->total_interest_express }} Total
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Daily Interest Express </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->daily_interest_express }} Daily
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Interest Approve </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->interest_approve }} Interest Approval
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Total Interest Approve </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->total_interest_approve }} Total 
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Daily Interest Approve </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->daily_interest_approve }} Daily
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Send Profile </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->send_profile == 1 ? 'Yes' : 'No' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Add Favorite </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->add_favorite }} Total
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Most Favorite </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->most_favorite }} Total Most Favorite
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Block Profile </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->block_profile == 1 ? 'Yes; can block profile.' : 'No; cannot block profile.' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%">
                                Counselling </td>
                            <td style="width: 65%" class="bold-text">
                                {{ $package->counselling == 1 ? 'Yes; you will get counselling feature.' : 'No; you will not get counselling feature.' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-1 hidden-xs">
            </div>
        </div>
    </div>
</div>

@endsection
