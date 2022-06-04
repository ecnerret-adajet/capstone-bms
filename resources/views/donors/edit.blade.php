@extends('layouts.app')

@section('content')
    <donor-edit :donor_id="{{ $donor->id }}"></donor-edit>
@endsection
