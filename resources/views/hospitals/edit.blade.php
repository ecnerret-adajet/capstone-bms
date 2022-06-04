@extends('layouts.app')

@section('content')
    <hospital-edit :hospital_id="{{ $hospital->id }}"></bloodrequest-edit>
@endsection
