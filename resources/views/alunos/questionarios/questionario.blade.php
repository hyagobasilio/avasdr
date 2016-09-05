@extends('layouts.aluno.template')
@section('content')

<div class="modal fade modal-small" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabelSmall">Entregar a Prova</h4>
      </div>
      <div class="modal-body modal-body-small">
        Deseja entregar a prova?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary modal-btn-entregar">Entregar</button>
      </div>

    </div>
  </div>
</div>
<!-- /modals -->
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2> {{ $questionario->descricao }} </h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form id="form-avaliacao" class="form-horizontal form-label-left" method="post"
        action=" {{ url('aluno/questionario/responder') }}">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="questionario_id" value="{{{ $questionario->id }}}" />
        
        <div class="row">
          <div class="dashboard-widget-content">
            <ul class="list-unstyled timeline widget">
              @foreach($questoes as $q)
              <li>
                <div class="block">
                  <div class="block_content">
                    <h2 class="title">
                      <a>{!! $q->questao->questao !!}</a>
                    </h2>
                    <div class="byline">
                      <!-- <span>13 hours ago</span> by <a>Jane Smith</a>-->
                    </div>
                    <p class="excerpt">{{ $q->questao->comando }}</p>
                    <div class="form-group">
                      @foreach($q->questao->alternativas as $alternativa)
                      <div class="checkbox">
                          <label>
                              <input type="radio" name="{{ $alternativa->questao_id }}" class="" value="{{ $alternativa->id }}"> {{ $alternativa->descricao }}
                          </label>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
                        
          <!-- Vigência-->
          <div class="col-md-12 col-sm-12 col-xs-12 ">
              <a class="btn btn-success btn-entregar">Entregar</a>
          </div>
        </div>
      </form>
    </div> <!-- x_content -->
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function(){

    $('.btn-entregar').click(function(){
      $('.modal-small').modal();
    });
    $('.modal-btn-entregar').click(function(){
      $('#form-avaliacao').submit();
    });
  });
</script>
@endsection