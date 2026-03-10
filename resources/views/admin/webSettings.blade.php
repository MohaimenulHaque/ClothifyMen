@extends('layouts.starterTemplate')

@section('dashboard_title')
    {{Str::upper(request()->path())}}
@endsection

@section('main_section')



@endsection