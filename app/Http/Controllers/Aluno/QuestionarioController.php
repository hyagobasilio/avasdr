<?php
namespace App\Http\Controllers\Aluno;
use App\Http\Controllers\Controller;
use App\Models\Questionario;
use App\Models\QuestionarioQuestao;
use Illuminate\Http\Request;
use App\Services\QuestionarioService;
use DB;

class QuestionarioController extends Controller {
    private $service;
    
    public function __construct(QuestionarioService $questionarioService) {
        $this->service = $questionarioService;
    }

    public function index()
    {
        
        $alunoId = auth('aluno')->user()->id;
        $questionarios = $this->service->getQuestionariosByAluno($alunoId);


        for($i = 0 ; $i < count($questionarios) ; $i++):
            $questionarios[$i]->acertos = $this->service->getAcertoPorAluno($questionarios[$i]->id, $alunoId);
        endfor;
          
        return view('alunos.questionarios.index', compact('questionarios'));
    }
    
    public function responder(Questionario $questionario)
    {
        $questoes = QuestionarioQuestao::where('questionario_id', $questionario->id)->get();        
        return view('alunos.questionarios.questionario', compact('questionario', 'questoes'));
    }
    public function postResponder(Request $request)
    {
        
        $dados = $request->all();
        $alunoId = auth('aluno')->user()->id;
        $questionarioId = $dados['questionario_id'];
        if ($this->service->getAcertoPorAluno($questionarioId, $alunoId) > 0 ) {
            return redirect('aluno/questionario');
        }
        unset($dados['questionario_id'], $dados['_token']);
        $inserts = array();
        foreach($dados as $questao => $resposta):
            $inserts[] = [
                'questao_id' => $questao, 
                'resposta' => $resposta, 
                'questionario_id'=>$questionarioId, 
                'aluno_id' => $alunoId 
              ];
        endforeach;
        \App\Models\Resposta::insert($inserts);
        return redirect('aluno/questionario')->with('sucesso' , 'Questionário Respondido com Sucesso!' );
        
    }
    
}