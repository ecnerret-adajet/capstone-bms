@extends('layouts.app')

@section('content')
    <bloodrequest-index :roles="{{ Auth::user()->roles->pluck('id') }}" ></bloodrequest-index>
@endsection
