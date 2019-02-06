@extends('mail.layouts.mail')
@section('mailbody')
    @isset($title)
        <h2>{{ $title }}</h2>
        @else
        header
    @endisset
    @isset($bodyText)
        <p>{!! $bodyText !!}</p>
        @else
        message
    @endisset    
@endsection