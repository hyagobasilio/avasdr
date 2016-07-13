@extends('layouts.docente.template')

@section('content')

<div class="page-title">
    <div class="title_left">
      <h3>Formulário</h3>
    </div>
</div>

<div class="row">
    @if(session('success'))
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-success"> Salvo com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    </div>
    @endif
</div>
<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
    
    <div class="x_panel">
      <div class="x_title">
        <h2>Cadastro <small>Questão</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post"
	action="@if (isset($questao)){{ url('docente/questao/' . $questao->id . '/edit') }}@else {{ url('docente/questao/create') }}@endif"
	>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        
            <!-- Formulário;-->
            <div class="row">
                <!-- curso-->
                <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('curso_id') ? 'bad' : '' }}">
                    <label for="curso_id">Curso</label>
                    
                    {!! Form::select('curso_id', $cursos, null, ['class' => 'form-control']) !!}
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('curso_id') !!}</li>
                    </ul>
                </div>
                <!-- Capacidade-->
                <div class="col-md-2 col-sm-2 col-xs-2 form-group {{ $errors->has('capacidade') ? 'bad' : '' }}">
                    <label for="capacidade">Capacidade</label>
                    <input type="text" name="capacidade" value="{{ old('capacidade')}}" class="form-control">
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('capacidade') !!}</li>
                    </ul>
                </div>
                <!-- Elemento de Competencia-->
                <div class="col-md-3 col-sm-3 col-xs-3 form-group {{ $errors->has('elemento_competencia') ? 'bad' : '' }}">
                    <label for="elemento_competencia">Elemento de Competência</label>
                    <input type="text" name="elemento_competencia" value="{{ old('elemento_competencia')}}" class="form-control">
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('elemento_competencia') !!}</li>
                    </ul>
                </div>
                
                <!-- Objeto Conhecimento-->
                <div class="col-md-3 col-sm-3 col-xs-3 form-group {{ $errors->has('obj_conhecimento') ? 'bad' : '' }}">
                    <label for="obj_conhecimento">Objeto Conhecimento</label>
                    <input type="text" name="obj_conhecimento" value="{{ old('obj_conhecimento')}}" class="form-control">
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('obj_conhecimento') !!}</li>
                    </ul>
                </div>
                <!-- Dificuldade -->
                <div class="col-md-2 col-sm-2 col-xs-2 form-group {{ $errors->has('dificuldade') ? 'bad' : '' }}">
                    <label for="dificuldade">Dificuldade</label>
                    <input type="text" name="dificuldade" value="{{ old('dificuldade')}}" class="form-control">
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('dificuldade') !!}</li>
                    </ul>
                </div>
                <!-- Resposta -->
                <div class="col-md-2 col-sm-2 col-xs-2 form-group {{ $errors->has('resposta') ? 'bad' : '' }}">
                    <label for="resposta">Resposta</label>
                    <?php $alternativas = ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D'=>'D','E'=>'E']; ?>
                    {!! Form::select('resposta', $alternativas, null, ['class' => 'form-control']) !!}
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('resposta') !!}</li>
                    </ul>
                </div>
                <!-- Resposta -->
                <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('questao') ? 'bad' : '' }}">
                    <label for="questao">Questão</label>
                    <textarea id="editor" name="questao" rows="3" class="editor form-control">{{ old('questao')}}</textarea>
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('questao') !!}</li>
                    </ul>
                </div>
                
                <!-- Comando -->
                <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('comando') ? 'bad' : '' }}">
                    <label for="comando">Comando</label>
                    <input type="text" name="comando" value="{{ old('comando')}}" class="form-control">
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('comando') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">                
                    <h3>Alternativas</h3>   
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('alternativa-a') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="alternativa-a" name="alternativa-a" value="{{ old('alternativa-a')}}" placeholder="Alternativa">
                    <span class=" form-control-feedback left" aria-hidden="true">A)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('alternativa-a') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('alternativa-b') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="alternativa-b" name="alternativa-b" value="{{ old('alternativa-b')}}" placeholder="Alternativa">
                    <span class=" form-control-feedback left" aria-hidden="true">B)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('alternativa-b') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('alternativa-c') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="alternativa-c" name="alternativa-c" value="{{ old('alternativa-c')}}" placeholder="Alternativa">
                    <span class=" form-control-feedback left" aria-hidden="true">C)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('alternativa-c') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('alternativa-d') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="alternativa-d" name="alternativa-d" value="{{ old('alternativa-d')}}" placeholder="Alternativa">
                    <span class=" form-control-feedback left" aria-hidden="true">D)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('alternativa-d') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('alternativa-e') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="alternativa-e" name="alternativa-e" value="{{ old('alternativa-e')}}" placeholder="Alternativa">
                    <span class=" form-control-feedback left" aria-hidden="true">E)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('alternativa-e') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">                
                    <h3>Justificativas</h3>   
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('justificativa-a') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="justificativa-a" name="justificativa-a" value="{{ old('justificativa-a')}}" placeholder="Justificativa">
                    <span class=" form-control-feedback left" aria-hidden="true">A)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('justificativa-a') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('justificativa-b') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="justificativa-b" name="justificativa-b" value="{{ old('justificativa-b')}}" placeholder="Justificativa">
                    <span class=" form-control-feedback left" aria-hidden="true">B)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('justificativa-b') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('justificativa-c') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="justificativa-c" name="justificativa-c" value="{{ old('justificativa-c')}}" placeholder="Justificativa">
                    <span class=" form-control-feedback left" aria-hidden="true">C)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('justificativa-c') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('justificativa-d') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="justificativa-d" name="justificativa-d" value="{{ old('justificativa-d')}}" placeholder="Justificativa">
                    <span class=" form-control-feedback left" aria-hidden="true">D)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('justificativa-d') !!}</li>
                    </ul>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback {{ $errors->has('justificativa-e') ? 'bad' : '' }}">
                    <input type="text" class="form-control has-feedback-left" id="justificativa-e" name="justificativa-e" value="{{ old('justificativa-e')}}" placeholder="Justificativa">
                    <span class=" form-control-feedback left" aria-hidden="true">E)</span>
                     <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{!! $errors->first('justificativa-e') !!}</li>
                    </ul>
                </div>
                
            </div>
            <!-- ./Formulário;-->
            

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{url('gestor/alunos')}}" class="btn btn-primary">Cancel</a>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>

        </form>
      </div>
    </div>
</div>
<div class="clearfix"></div>

@stop
