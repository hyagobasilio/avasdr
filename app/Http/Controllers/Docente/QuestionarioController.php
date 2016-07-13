<?php
namespace App\Http\Controllers\Docente;
use App\Http\Controllers\Controller;
use App\Http\Requests\Docente\QuestionarioRequest;
use App\Models\QuestaoTemp;
use App\Models\Questionario;
use App\Models\QuestionarioQuestao;
use App\Models\Turma;
use App\Services\QuestionarioService;

class QuestionarioController extends Controller
{
    private $service;
    
    public function __construct(QuestionarioService $questionarioService) {
        $this->service = $questionarioService;
    }
    public function index()
    {
        $questionarios = Questionario::paginate(15);
        return view('docentes.questionarios.index', compact('questionarios'));
    }
    public function create()
    {
        $docenteLogado = auth()->guard('docente')->user();
        $questoes = QuestaoTemp::where('docente_id', $docenteLogado->id)->paginate(15);
        $turmas = Turma::lists('nome', 'id');
        return view('docentes.questionarios.create_edit', compact('questoes', 'turmas'));
    }
    
    public function store(QuestionarioRequest $request)
    {
        $idDocente = auth()->guard('docente')->user()->id;
        $questionrio = new Questionario;
        $questionrio->descricao   = $request->get('descricao');
        $questionrio->vigencia   = $request->get('vigencia');
        $questionrio->turma_id    = $request->get('turma_id');
        $questionrio->docente_id  = $idDocente;
        $questionrio->save();
        
        $temporarias = QuestaoTemp::where('docente_id', $idDocente)->get();
        foreach($temporarias as $temporaria) {
            QuestionarioQuestao::create(['questionario_id' => $questionrio->id, 
                'questao_id' => $temporaria->questao_id]);
        }
        $questionrio->qtd_questoes = count($temporarias);
        $questionrio->save();
        $x = QuestaoTemp::where('docente_id', $idDocente)->delete();
        return redirect('docente/questionario');
        
    }
    
    public function estatistica(Questionario $questionario)
    {
        $alunos = \App\Models\AlunoTurma::select('alunos.id', 'alunos.name','aluno_turma.aluno_id')
                ->where('turma_id', $questionario->turma_id)->with('aluno')
                ->join('alunos', 'aluno_turma.aluno_id', '=', 'alunos.id')
                ->get();
        for ($i = 0; $i < count($alunos); $i++):
            $alunos[$i]->acertos = $this->service->getAcertoPorAluno($questionario->id, $alunos[$i]->aluno_id);
        endfor;
        
        return view('docentes.questionarios.estatistica', compact('alunos', 'questionario'));
    }
}