@extends('layouts.modalcolorbox')
@section('content')
{{ Form::open(['method' => 'DELETE', 'url' => url('/gestor/responsavel/'.$responsavel->id)]) }}
	<div class="form-group">
		<div class="controls">
			<p>Deseja realmente excluir este item?</p>
			<element class="btn btn-warning btn-sm close_popup">
			<span class="glyphicon glyphicon-ban-circle"></span>
      Cancelar</element>
			<button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"></span> Deletar
			</button>
		</div>
	</div>
{{ Form::close() }}
@stop
