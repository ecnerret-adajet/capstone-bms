@extends('layouts.app')

@section('content')
    <event-index :roles="{{ Auth::user()->roles->pluck('id') }}"></event-index>
@endsection
