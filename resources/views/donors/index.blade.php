@extends('layouts.app')

@section('content')
    <donor-index :roles="{{ Auth::user()->roles->pluck('id') }}"></donor-index>
@endsection
