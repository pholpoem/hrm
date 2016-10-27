@extends('admin.layouts.master')
@section('title','หน้าหลัก')

@section('content')
{{Request::path()}}
@endsection