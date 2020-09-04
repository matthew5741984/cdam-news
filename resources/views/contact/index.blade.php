@extends('layout.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/vendor/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/contact/contact.css') }}" />
@endsection

@section('maincontent')
    @include('partials.jumbotron-2')

    @include('widgets.contact-form')
@endsection
