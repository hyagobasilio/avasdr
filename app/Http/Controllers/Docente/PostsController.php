<?php
namespace App\Http\Controllers\Docente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Docente\QuestaoRequest;
use App\Models\Post;
use App\Models\Turma;
use App\Models\Materia;

class PostsController extends Controller {

    public function index()
    {
        $dados['turmas'] = ['' => 'Selecione'] + Turma::lists('nome', 'id')->toArray();
        $dados['materias'] = ['' => 'Selecione'] + Materia::lists('nome', 'id')->toArray();
        $posts = Post::paginate(15);
        return view('docentes.posts.index', compact('posts', 'dados'));
    }
    public function create()
    {
        $dados['turmas'] = ['' => 'Selecione'] + Turma::lists('nome', 'id')->toArray();
        $dados['materias'] = ['' => 'Selecione'] + Materia::lists('nome', 'id')->toArray();
        return view('docentes.posts.create_edit', compact('dados'));
    }
    
    public function store(QuestaoRequest $request)
    {
        
    }
}