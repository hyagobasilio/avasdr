<?php
namespace App\Http\Controllers\Docente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Docente\QuestaoRequest;
use App\Models\Post;
use App\Models\Turma;
use App\Models\Materia;
use App\Models\File;
use Illuminate\Http\Request;  
use App\Http\Requests\Docente\PostRequest;

class PostsController extends Controller {

    public function index()
    {
        $dados['turmas'] = ['' => 'Todas'] + Turma::lists('nome', 'id')->toArray();
        $dados['materias'] = ['' => 'Selecione'] + Materia::lists('nome', 'id')->toArray();
        $posts = Post::paginate(15);
        return view('docentes.posts.index', compact('posts', 'dados'));

    }
    
}