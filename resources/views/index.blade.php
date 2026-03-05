@extends('layouts.app')

@section('title', 'Konsep Sistem Jadwal')

@section('content')
    @include('partials.header')
    @include('partials.sections.schedule-mockup')
    @include('partials.sections.concept')
    @include('partials.sections.roles')
    @include('partials.sections.logic-final')
    @include('partials.sections.counting-shift')
    @include('partials.sections.export-excel')
    @include('partials.sections.architecture')
    @include('partials.sections.ui-ux')
    @include('partials.sections.no-login')
    @include('partials.sections.advanced')
@endsection
