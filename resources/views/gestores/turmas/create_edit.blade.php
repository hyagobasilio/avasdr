@extends('layouts.gestor.template')

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Formulário</h3>
  </div>
</div>
<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cadastro <small>Turma</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post"
        	action="@if (isset($turma)){{ url('gestor/turmas/' . $turma->id . '/edit') }}@endif"
        	autocomplete="off">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nome" name="nome" required="required" data-validate-length-range="6" data-validate-words="2" class="form-control col-md-7 col-xs-12" value="{{{ old('nome', isset($turma) ? $turma->nome : null) }}}">
                {{ $errors->first('name', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Ano<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" id="ano" min="2000" name="ano" required="required" class="form-control col-md-7 col-xs-12" value="{{{ old('ano', isset($turma) ? $turma->ano : null) }}}">
                {{ $errors->first('ano', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Estágio Educacional<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::select('estagio_educacional',$estagiosEducacionais, null, ['class' => 'form-control', 'id' => 'estagio_educacional']) !!}
                {{ $errors->first('ano', "<label class=\"control-label\" for=\"inputError\"\> :message </label>") }}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Custom</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1">
                  <option></option>
                  <option value="AK">Alaska</option>
                  <option value="HI">Hawaii</option>
                  <option value="CA">California</option>
                  <option value="NV">Nevada</option>
                  <option value="OR">Oregon</option>
                  <option value="WA">Washington</option>
                  <option value="AZ">Arizona</option>
                  <option value="CO">Colorado</option>
                  <option value="ID">Idaho</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NM">New Mexico</option>
                  <option value="ND">North Dakota</option>
                  <option value="UT">Utah</option>
                  <option value="WY">Wyoming</option>
                  <option value="AR">Arkansas</option>
                  <option value="IL">Illinois</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="OK">Oklahoma</option>
                  <option value="SD">South Dakota</option>
                  <option value="TX">Texas</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ativo<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="ativo" name="ativo" type="checkbox" data-on="Ativo" data-off="Desativo" checked data-toggle="toggle">
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{url('gestor/turmas')}}" class="btn btn-primary">Cancel</a>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>

        </form>
      </div>
    </div>
</div>



@stop

@section('scripts')
<script type="text/javascript">
  $(function(){
    $("#estagio_educacional").select2({});
    $(".select2_single").select2({
      placeholder: "Select a state",
      allowClear: true
    });

  });
</script>
@endsection
