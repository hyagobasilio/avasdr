@extends('layouts.modalcolorbox')
@section('content')
{!! Form::model($model, array('url' => url('gestor/serie') . '/' . $model->id, 'method' => 'delete', 'class' => 'bf', 'files'=> true)) !!}
	<div class="form-group">
		<div class="controls">
			<p>Tem certeza que deseja deletar?</p>
			<element class="btn btn-warning btn-sm close_popup">
			<span class="glyphicon glyphicon-ban-circle"></span> Cancelar</element>
			<button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"></span> Deletar
			</button>
		</div>
	</div>
</form>

@stop
