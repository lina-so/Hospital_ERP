@extends('staff::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('staff.name') !!}</p>
@endsection
