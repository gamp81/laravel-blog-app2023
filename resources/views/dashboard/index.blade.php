@extends('dashboard.layouts.main')

@section('container')

  <x-dashboard-title title="Welcome back, {{ auth()->user()->name }}" />
@endsection