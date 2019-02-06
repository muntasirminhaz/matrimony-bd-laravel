{{-- Most Favorite Start --}}

@if ($limitMostFavorite)
@if ($alreadyMostFavorite)
<a data-toggle="popover" data-trigger="hover" data-content="You have added this user to most favorites." data-placement="top"
    class="btn btn-default btn-xs pull-right mobile-send-button-fix"><span class="fa fa-bookmark-o"></span></a>
@else
<a class="btn btn-primary btn-xs pull-right mobile-send-button-fix" data-toggle="modal" href='#mostfavorite{{ $user->id }}'><span
        class="fa fa-plus-square-o"></span></a>
<div class="modal fade" id="mostfavorite{{ $user->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('users.sendMostFavorite', $user->id)  }}" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add {{ $user->first_name }} <br>to Most Favorite?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right  btn-xs">Add to Most Favorite</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@else
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Profiles to Most Favorite."
    data-placement="top" class="btn btn-default btn-xs pull-right mobile-send-button-fix"><span class="fa fa-gift"></span></a>
@endif
{{-- Most Favorite End --}}


{{-- Favorite Start --}}

@if ($limitFavorite)

@if ($alreadyFavorite)
<a data-toggle="popover" data-trigger="hover" data-content="You have added this user to favorites." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-bookmark-o"></span></a>
@else
<a class="btn btn-info btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal" href='#favorite{{ $user->id }}'><span
        class="fa fa-bookmark-o"></span></a>
<div class="modal fade" id="favorite{{ $user->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('users.sendFavorite', $user->id)  }}" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add {{ $user->first_name }} to Favorite</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right  btn-xs">Add to Most Favorite</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@else
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Profiles to Favorite"
    data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-gift"></span></a>
@endif
{{-- Favorite End --}}


{{-- Interest Start --}}

@if ($limitInterest)

@if ($alreadyInterestExpressed)
<a data-toggle="popover" data-trigger="hover" data-content="You have expressd interest to this user." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-gift"></span></a>
@else
<a class="btn btn-warning btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal" href='#interest{{ $user->id }}'><span
        class="fa fa-gift"></span></a>
<div class="modal fade" id="interest{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('users.sendInterest', $user->id)  }}" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Express Interest to {{ $user->first_name }}</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                    @foreach (interestMessages() as $key => $value)
                    <div class="form-group">
                        <label for="messageid{{ $key }}" data-megval='{{  $key }}'>
                            <input type="radio" value="{{ $key }}" name="messageid" id="messageid{{ $key }}">
                            {{ $value }}
                        </label>
                    </div>
                    @endforeach

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right btn-xs">Express
                        Interest</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@else
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Express Interest."
    data-placement="top" class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-gift"></span></a>
@endif
{{-- Interest End --}}


{{-- Message Start --}}
@if ($limitMessage)

<a class="btn btn-success btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal" href='#message{{ $user->id }}'><span
        class="fa fa-envelope-o"></span></a>
<div class="modal fade" id="message{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('users.sendMessage', $user->id)  }}" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Send Message to {{ $user->first_name }}</h4>
                </div>
                <div class="modal-body">
                    <input required type="text" name="title" class="form-control" placeholder="Enter Message Title">
                    <br>
                    <textarea required name="message" placeholder="Enter Your Message" class="form-control" cols="30"
                        rows="3"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right btn-xs">Send
                        Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to send messages." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-envelope-o"></span></a>
@endif

{{-- Message End --}}

{{-- Contact Start --}}

@if ($limitContact)
@if ($alreadyContactAdded)
<a data-toggle="popover" data-trigger="hover" data-content="You have added this user to most favorites." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-user-plus"></span></a>
@else
<a class="btn btn-pinterest btn-xs pull-right margin-right-7 mobile-send-button-fix" data-toggle="modal" href='#contact{{ $user->id }}'><span
        class="fa fa-user-plus"></span></a>
<div class="modal fade" id="contact{{ $user->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('users.sendContact', $user->id)  }}" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Contact info of {{ $user->first_name }}</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-xs pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right  btn-xs">Add to Contacts</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@else
<a data-toggle="popover" data-trigger="hover" data-content="Upgrade Your Membership to Add Contact." data-placement="top"
    class="btn btn-default btn-xs pull-right margin-right-7 mobile-send-button-fix"><span class="fa fa-user-plus"></span></a>
@endif
{{-- Contact End --}}
