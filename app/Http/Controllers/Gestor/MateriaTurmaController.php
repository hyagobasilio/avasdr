<?php 
namespace App\Http\Controllers\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MateriaTurmaRequest;

use App\Models\Turma;
use App\Models\Materia;
use App\Models\MateriaTurma;
use DB;

class MateriaTurmaController extends Controller {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $materias = Materia::all();

        $turmas = Turma::select('turmas.id', 'turmas.nome')->get();

        // Show the page
        return view('gestores.materiasturmas.index', compact('turmas', 'materias'));
    }

    public function postCreate(\Illuminate\Http\Request $request){
        if(strlen($request->materia_id) == 0) {
            MateriaTurma::where('turma_id', '=', $request->turma_id)->delete();
            return redirect("/gestor/materias-turma");
        }
        $idMateriaRequest = explode("|", $request->materia_id);
        $materias = [];
        $materiasDelete = [];

        $materiasDoBanco = MateriaTurma::select('materia_turma.materia_id')
            ->where('turma_id', '=', (int)$request->turma_id)
            ->get();

        foreach($materiasDoBanco as $banco) {
            if( !in_array($banco->materia_id, $idMateriaRequest) ) {
                array_push($materiasDelete,$banco->materia_id);
            }else {
                array_push($materias, $banco->materia_id);
            }
        }

        if(count($materiasDelete) > 0) {

            MateriaTurma::whereIn('materia_id', $materiasDelete)->where('turma_id', '=', $request->turma_id)->delete();
        }

        $idMaterias = array_diff($idMateriaRequest, $materias);

        $materiasInserts = [];
        if(count($materias) == 0) {
            $idMaterias = $idMateriaRequest;
        }
        foreach($idMaterias as $idMateria) {
            array_push($materiasInserts, ['materia_id' => $idMateria, 'turma_id' => $request->turma_id]);
        }
        if(count($idMaterias) > 0) {
            MateriaTurma::insert($materiasInserts);
        }

        return redirect("/gestor/materias-turma");
    }

    public function getMateriasRelacionadas($idTurma) {
        $dados['materias'] = DB::table('materia_turma')->select('materias.id', 'materias.nome')
            ->join('materias', 'materias.id', '=', 'materia_turma.materia_id')
            ->where('materia_turma.turma_id', '=', $idTurma)
            ->get();
        return response()->json($dados);

    }

}