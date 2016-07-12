@extends('layouts.docente.template')
@section('content')
    {{ auth()->guard('docente')->user()->email }}
@endsection