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
    public function create()
    {
        $dados['turmas'] = ['' => 'Selecione'] + Turma::lists('nome', 'id')->toArray();
        $dados['materias'] = ['' => 'Selecione'] + Materia::lists('nome', 'id')->toArray();
        return view('docentes.posts.create_edit', compact('dados'));
    }
    
    public function store(PostRequest $request)
    {
        $post = $request->all();
        $post['docente_id'] = auth('docente')->user()->id;
        Post::create($post);
        return redirect()->back();
    }

    public function upload()
    {
        /**
        * Request related
        */
        $file = \Request::file('documento');
        $userId = auth('docente')->user()->id;
        /**
        * Storage related
        */
        $storagePath = public_path().'/documentos/'.$userId;
        $fileName = $file->getClientOriginalName();
        $fileNameCustom = date('dmY-his'). str_random(4).$fileName;
        /**
        * Database related
        */
        $fileModel = new File();
        $fileModel->name = $fileNameCustom;
        $fileModel->original_name = $fileName;
        $fileModel->docente_id = $userId;
        $fileModel->save();
        $file->move($storagePath, $fileNameCustom);

        return response()->json($fileModel);
    }
}