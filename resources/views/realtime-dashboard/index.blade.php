@extends('layout.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/realtime-dashboard/realtime-dashboard.css') }}">
@endsection

@section('maincontent')
    @include('partials.jumbotron-2')

    @include('widgets.realtime-dashboard')
@endsection
