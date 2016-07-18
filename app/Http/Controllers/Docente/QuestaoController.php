<?php
namespace App\Http\Controllers\Docente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Docente\QuestaoRequest;
use App\Models\Questao;
use App\Models\Curso;
use App\Models\Alternativa;

class QuestaoController extends Controller {

    public function index()
    {
        $questoes = Questao::paginate(15);
        return view('docentes.questao.index', compact('questoes'));
    }
    public function create()
    {
        $cursos = Curso::lists('nome', 'id');
        return view('docentes.questao.create_edit', compact('cursos'));
    }
    
    public function store(QuestaoRequest $request)
    {
        $letras = 'abcde';
        $dados = $request->all();
        $dados['docente_id'] = auth()->guard('docente')->user()->id;
        $questao = Questao::create($dados);
        
        for($i = 0 ; $i < strlen($letras); $i++)
        {
            $resposta = new Alternativa();    
            $resposta->descricao     = $request->get('alternativa-'.$letras[$i]);
            $resposta->justificativa = $request->get('justificativa-'.$letras[$i]);
            $resposta->questao_id    = $questao->id;
            $resposta->save();
            if (strtolower($dados['resposta']) == $letras[$i]) {
                $questao->resposta   = $resposta->id;
                $questao->save();
            }
        }
        return back()->with(['success' => 'Cadastrado com Sucesso']);
    }
}