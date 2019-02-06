@extends('adminlte::page')
@section('title', 'Set User Agent')

@section('content_header')
<h1>Set User Agent</h1>
@stop

@section('content')

<form action="{{ route('admin.userAgent.setUserAgentSubmit') }}" method="POST" role="form">
    @csrf
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header h4">
                Set Agent
                @if ($userid > 0) 
                    For User <strong>{{ $userid }} ({{ $userName }})</strong> 
                @endif
            </div>
            <div class="box-body">
                    <div class="form-group">
                        <label for="userid">User ID</label>
                        <input value="{{ $userid > 0 ? $userid : '' }}"
                        type="text" class="form-control" id="userid" name="userid" placeholder="userid">
                    </div>
                    <div class="form-group">
                        <label for="userid">Assign Agent</label>
                        <select name="agentid" id="agentid" class="form-control">
                            <option value="">Select Agent ...</option>
                            @foreach ($agents as $item)
                            <option {{ $agentid == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>                                
                            @endforeach
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <a href='' class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success pull-right">Assign Agent</button>
                </div>
            </div>
            
            
            
        </div>
    </div>
    
</form>
@stop
