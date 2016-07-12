@extends('layouts.gestor.template')
@section('content')
{{ auth()->guard('gestor')->user()->email }}
@endsection