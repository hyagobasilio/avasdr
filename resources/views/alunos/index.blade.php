@extends('layouts.aluno.template')
@section('content')
    {{ auth()->guard('aluno')->user()->email }}
@endsection