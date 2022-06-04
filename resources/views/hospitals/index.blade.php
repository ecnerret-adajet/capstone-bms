@extends('layouts.app')

@section('content')
    <hospital-index :roles="{{ Auth::user()->roles->pluck('id') }}"></hospital-index>
@endsection
