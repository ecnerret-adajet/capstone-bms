@extends('layouts.app')

@section('content')
    <bloodrequest-approval :bloodrequest={{ $bloodRequest }} ></bloodrequest-approval>
@endsection
