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


    # Posts
    Route::get('post', 'Docente\PostsController@index');
    Route::get('post/create', 'Docente\PostsController@create');

        
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
    
    # Docente
    Route::get('docentes', 'Gestor\DocenteController@index');
    Route::get('docentes/create', 'Gestor\DocenteController@create');
    Route::post('docentes/create', 'Gestor\DocenteController@store');
    
    #Materias
    Route::get('materias', 'Gestor\MateriaController@index');
    Route::get('materias/data', 'Gestor\MateriaController@data');
    Route::get('materias/create', 'Gestor\MateriaController@getCreate');
    Route::post('materias/create', 'Gestor\MateriaController@postCreate');
    Route::post('materias/{id}/edit', 'Gestor\MateriaController@postEdit');
    Route::get('materias/{id}/edit', 'Gestor\MateriaController@getEdit');
    
    # Turmas
    Route::get('turmas', 'Gestor\TurmaController@index');
    Route::get('turmas/data', 'Gestor\TurmaController@data');
    Route::get('turmas/create', 'Gestor\TurmaController@getCreate');
    Route::post('turmas/create', 'Gestor\TurmaController@postCreate');
    Route::post('turmas/{id}/edit', 'Gestor\TurmaController@postEdit');
    Route::get('turmas/{id}/edit', 'Gestor\TurmaController@getEdit');
    
    # Realacionamento Alunos turma
    Route::get('alunos-turma', 'Gestor\AlunoTurmaController@index');
    Route::post('alunos-turma/create', 'Gestor\AlunoTurmaController@postCreate');
    Route::get('alunos-turma/{idTurma}/alunos', 'Gestor\AlunoTurmaController@getAlunosRelacionados');
    
    #Realacionamento Professor Materias
    Route::get('docente-materias', 'Gestor\DocenteMateriaController@index');
    Route::post('docente-materias/create', 'Gestor\DocenteMateriaController@postCreate');
    Route::get('docente-materias/{idProfessor}/materias', 'Gestor\DocenteMateriaController@getMateriasRelacionadas');
    
    #Realacionamento Docente Turma
    Route::get('/docente-turmas','Gestor\DocenteTurmaController@index');
    Route::post('docente-turmas/create', 'Gestor\DocenteTurmaController@postCreate');
    Route::get('docente-turmas/{idGestor}/turmas', 'Gestor\DocenteTurmaController@getTurmasRelacionadas');
    
    #Realacionamento Materias turma
    Route::get('materias-turma', 'Gestor\MateriaTurmaController@index');
    Route::post('materias-turma/create', 'Gestor\MateriaTurmaController@postCreate');
    Route::get('materias-turma/{idTurma}/materias', 'Gestor\MateriaTurmaController@getMateriasRelacionadas');
   
});



Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Route::get('/home', 'HomeController@index');
