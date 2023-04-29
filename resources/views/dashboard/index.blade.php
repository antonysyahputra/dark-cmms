@extends('layouts.index')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <p>{{ __('Test') }}</p>
    {{-- @dd(auth()->user()->name) --}}
@endsection
