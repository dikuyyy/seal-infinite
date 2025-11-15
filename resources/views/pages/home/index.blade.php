@extends('layouts.app')

@section('title', 'Seal Infinite')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    @include('pages.home.components.hero-event-section')
    @include('pages.home.components.library-section')
    @include('pages.home.components.stats-section')
    {{-- @include('pages.home.components.rank-section') --}}
    @include('pages.home.components.achievement-section')
    @include('pages.home.components.calendar-discord-section')
    @include('pages.home.components.register-section')
@endsection
