<?php
Route::get('/docente/login', 'DocenteController@login');
Route::post('/docente/login', 'DocenteController@postLogin');

Route::get('/aluno/create', function() {
    return view('auth.register');
});
Route::post('aluno/create', 'Gestor\AlunoController@register');

Route::get('/aluno/login', 'AlunoController@login');
Route::post('/aluno/login', 'AlunoController@postLogin');
Route::group(['middleware' => 'auth:aluno', 'prefix' => 'aluno'], function(){
        Route::get('/', 'AlunoController@index');
        Route::get('/logout', 'AlunoController@logout');

        # Questionários
        Route::get('/questionario', 'Aluno\QuestionarioController@index');
        Route::get('/questionario/{questionario}/responder', 'Aluno\QuestionarioController@responder');
        Route::post('/questionario/responder', 'Aluno\QuestionarioController@postResponder');

});

Route::group(['middleware' => 'auth:docente', 'prefix' => 'docente'], function(){
    Route::get('/', 'DocenteController@index');
    Route::get('/logout', 'DocenteController@logout');

    # Files
    Route::get('file', 'Docente\FilesController@index');
    Route::post('file/upload', 'Docente\FilesController@upload');
    Route::get('file/{file}/delete', 'Docente\FilesController@destroy');


    # Posts
    Route::get('post', 'Docente\PostsController@index');
    Route::get('post/create', 'Docente\PostsController@create');
    Route::post('post/upload', 'Docente\PostsController@upload');
    Route::post('post', 'Docente\PostsController@store');


    # Questão
    Route::get('questao', 'Docente\QuestaoController@index');
    Route::get('questao/create', 'Docente\QuestaoController@create');
    Route::post('questao/create', 'Docente\QuestaoController@store');

    # Questão Temporaria
    Route::post('questaotemp/create', 'Docente\QuestaoTempController@store');
    Route::get('questaotemp/{idTemp}/delete', 'Docente\QuestaoTempController@destroy');

    # Questionário
    Route::get('questionario/create', 'Docente\QuestionarioController@create');
    Route::post('questionario/create', 'Docente\QuestionarioController@store');
    Route::get('questionario', 'Docente\QuestionarioController@index');
    Route::get('questionario/{questionario}/estatistica', 'Docente\QuestionarioController@estatistica');

});

Route::get('/gestor/login', 'GestorController@login');
Route::post('/gestor/login', 'GestorController@postLogin');
Route::group(['middleware' =>  'auth:gestor', 'prefix' => 'gestor'], function(){

    Route::get('/', 'GestorController@index');
    Route::get('/logout', 'GestorController@logout');

    # Alunos
    Route::get('alunos', 'Gestor\AlunoController@index');
    Route::get('alunos/create', 'Gestor\AlunoController@create');
    Route::post('alunos', 'Gestor\AlunoController@store');
    Route::get('alunos/{aluno}/edit', 'Gestor\AlunoController@edit');
    Route::put('alunos/{aluno}/edit', 'Gestor\AlunoController@update');
    Route::get('alunos/iscadastrado', 'Gestor\AlunoController@isCadastrado');

    # Docente
    Route::get('docentes', 'Gestor\DocenteController@index');
    Route::get('docentes/create', 'Gestor\DocenteController@create');
    Route::post('docentes/create', 'Gestor\DocenteController@store');


    #Materias
    Route::get('materias', 'Gestor\MateriaController@index');
    Route::get('materias/data', 'Gestor\MateriaController@data');
    Route::get('materias/create', 'Gestor\MateriaController@getCreate');
    Route::post('materias', 'Gestor\MateriaController@store');
    Route::put('materias/{materia}/edit', 'Gestor\MateriaController@update');
    Route::get('materias/{materia}/edit', 'Gestor\MateriaController@edit');

    # Turmas
    Route::get('turmas', 'Gestor\TurmaController@index');
    Route::get('turmas/data', 'Gestor\TurmaController@data');
    Route::get('turmas/create', 'Gestor\TurmaController@getCreate');
    Route::post('turmas/create', 'Gestor\TurmaController@postCreate');
    Route::post('turmas/{id}/edit', 'Gestor\TurmaController@postEdit');
    Route::get('turmas/{id}/edit', 'Gestor\TurmaController@getEdit');

    # Relacionamento Alunos turma
    Route::get('alunos-turma', 'Gestor\AlunoTurmaController@index');
    Route::post('alunos-turma/create', 'Gestor\AlunoTurmaController@postCreate');
    Route::get('alunos-turma/{idTurma}/alunos', 'Gestor\AlunoTurmaController@getAlunosRelacionados');

    #Relacionamento Professor Materias
    Route::get('docente-materias', 'Gestor\DocenteMateriaController@index');
    Route::post('docente-materias/create', 'Gestor\DocenteMateriaController@postCreate');
    Route::get('docente-materias/{idProfessor}/materias', 'Gestor\DocenteMateriaController@getMateriasRelacionadas');

    #Relacionamento Docente Turma
    Route::get('/docente-turmas','Gestor\DocenteTurmaController@index');
    Route::post('docente-turmas/create', 'Gestor\DocenteTurmaController@postCreate');
    Route::get('docente-turmas/{idGestor}/turmas', 'Gestor\DocenteTurmaController@getTurmasRelacionadas');

    #Relacionamento Materias turma
    Route::get('materias-turma', 'Gestor\MateriaTurmaController@index');
    Route::post('materias-turma/create', 'Gestor\MateriaTurmaController@postCreate');
    Route::get('materias-turma/{idTurma}/materias', 'Gestor\MateriaTurmaController@getMateriasRelacionadas');

    # cursos
    Route::get('cursos', 'Gestor\CursosController@index');
    Route::get('cursos/create', 'Gestor\CursosController@create');
    Route::post('cursos', 'Gestor\CursosController@store');
    Route::get('cursos/{curso}/edit', 'Gestor\CursosController@edit');
    Route::put('cursos/{curso}/edit', 'Gestor\CursosController@update');

    #Relacionamento Escola Estágio Educacional
    Route::get('/escola-estagio-educacional','Gestor\EscolaEstagioEducacionalController@index');
    Route::post('escola-estagio-educacional', 'Gestor\EscolaEstagioEducacionalController@store');
    Route::get('escola-estagio-educacional/{idEscola}/estagios', 'Gestor\EscolaEstagioEducacionalController@getEstagiosRelacionados');

    #Relacionamento Curso Materias
    Route::get('curso-materias', 'Gestor\CursoMateriaController@index');
    Route::post('curso-materias', 'Gestor\CursoMateriaController@store');
    Route::get('curso-materias/{idCurso}/materias', 'Gestor\CursoMateriaController@getMateriasRelacionadas');

    #Responsaveis
    Route::get('responsavel/create', 'Gestor\ResponsavelController@create');
    Route::get('responsavel', 'Gestor\ResponsavelController@index');
    Route::put('responsavel/{responsavel}', 'Gestor\ResponsavelController@update');
    Route::get('responsavel/{responsavel}/edit', 'Gestor\ResponsavelController@edit');
    Route::post('responsavel', 'Gestor\ResponsavelController@store');
    Route::get('responsavel/consulta', 'Gestor\ResponsavelController@getResponsavelForAutocomplete');
    Route::get('responsavel/consulta/mae', 'Gestor\ResponsavelController@getMae');
    Route::get('responsavel/consulta/pai', 'Gestor\ResponsavelController@getPai');
    Route::get('responsavel/{responsavel}', 'Gestor\ResponsavelController@view');
    Route::get('responsavel/{responsavel}/delete', 'Gestor\ResponsavelController@delete');
    Route::delete('responsavel/{responsavel}', 'Gestor\ResponsavelController@destroy');

});



Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Route::get('/home', 'HomeController@index');
