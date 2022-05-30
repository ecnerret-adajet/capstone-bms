@extends('layouts.app')

@section('content')
    <bloodrequest-profile :roles="{{ Auth::user()->roles->pluck('id') }}" ></bloodrequest-profile>
@endsection
