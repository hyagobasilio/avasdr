<?php 
namespace App\Http\Controllers\Gestor;

use App\Http\Controllers\Controller;
use App\Models\DocenteTurma;
use App\Models\Turma;
use App\Docente;
use DB;

class DocenteTurmaController extends Controller {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $docentes = Docente::select('docentes.id', 'docentes.name')->get();
        $turmas = Turma::all();

        // Show the page
        return view('gestores.docenteturmas.index', compact('docentes', 'turmas'));
    }
    public function postCreate(\Illuminate\Http\Request $request)
    {
        $idTurmasRequest = explode("|", $request->get('idsTurmas'));
        
        if(strlen($request->idsTurmas) == 0 ) {
            // Se vier vazio entao deleta todos os registro deste docente
            DB::table('docente_turma')->where('docente_id', $request->docente_id)->delete();
            return redirect("/gestor/docente-turmas");
        }

        // Seleciona todos os relacionamentos
        $inserts = array();
        $turmas = DocenteTurma::select('docente_turma.turma_id')->where('docente_id','=', $request->docente_id)->get();
        $turmasDelete= array();
        foreach($turmas as $banco) {
            if( !in_array($banco->turma_id, $idTurmasRequest) ) { // Verifica se o item nao est� na nova lista
                $turmasDelete[] = $banco->turma_id; // Insere o id para ser inserido
            }else {
                $inserts[] = $banco->turma_id;      //novos que serao inseridos;
            }
        }

        if(count($turmasDelete) > 0) {
            DocenteTurma::whereIn('turma_id', $turmasDelete)->where('docente_id', '=', (int)$request->docente_id)->delete();
        }

        $idTurmas = array_diff($idTurmasRequest, $inserts);
        $turmasInserts = [];

        if(count($inserts) == 0)
            $idTurmas = $idTurmasRequest;

        foreach($idTurmas as $idTurma) {
            $turmasInserts[] = ['turma_id' => $idTurma, 'docente_id' => $request->docente_id];

        }
        if(!empty($turmasInserts))
            DocenteTurma::insert($turmasInserts);


        return redirect("/gestor/docente-turmas");
    }

    public function getTurmasRelacionadas($idDocente) {
        $alunos = DB::table('turmas')->select('turmas.id', 'turmas.nome')
            ->join('docente_turma', 'docente_turma.turma_id', '=', 'turmas.id')
            ->where('docente_turma.docente_id' , '=', $idDocente)
            ->get();
        $dados['turmas'] = $alunos;

        return response()->json($dados);

    }

}