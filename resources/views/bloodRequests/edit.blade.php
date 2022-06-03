@extends('layouts.app')

@section('content')
    <bloodrequest-edit :bloodrequest_id="{{ $bloodRequest->id }}"></bloodrequest-edit>
@endsection
