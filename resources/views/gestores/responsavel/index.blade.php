@extends('layouts.gestor.template')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="pull-right">
                <a href="{{{ url('gestor/responsavel/create') }}}"
                   class="btn btn-sm  btn-primary iframe"><span
                            class="glyphicon glyphicon-plus-sign"></span> Novo</a>
            </div>
        </div>
    </div>
<br>
<div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-3 form-group pull-right top_search">
    <div class="input-group">
    <form>
            <span class="input-group-btn">
            <input class="form-control" type="text" name="nome" placeholder="Pesquisa" value="">
             <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </span>
    </form>
    </div>
    </div>
</div>
<div class="row">
    <div class="col_md_12">
        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                @foreach($responsaveis as $responsavel)
                <tr>
                    <td>{{$responsavel->nome}}</td>
                    <td>{{$responsavel->cpf}}</td>
                    <td>{{$responsavel->telefone1 }} {{ $responsavel->telefone2 }}</td>
                    <td>
                      <a href="{{ url('gestor/responsavel/'.$responsavel->id.'/edit'
                    )}}" class="iframe"> <span class="fa fa-edit"></span> Editar</a>
                      <a href="{{ url('gestor/responsavel/'.$responsavel->id
                    )}}" class="iframe"> <span class="fa fa-eye"></span> Visualizar</a>
                      <a href="{{ url('gestor/responsavel/'.$responsavel->id.'/delete'
                    )}}" class="iframe"> <span class="fa fa-trash"></span> Deletar</a>

                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="box-tools pull-right">
            {{ $responsaveis->appends(Request::except('page'))->render() }}
        </div>
    </div>
</div>
@endsection
