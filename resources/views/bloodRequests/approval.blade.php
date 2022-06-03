@extends('layouts.app')

@section('content')
    <bloodrequest-approval :bloodrequest={{ $bloodRequest->id }} ></bloodrequest-approval>
@endsection
