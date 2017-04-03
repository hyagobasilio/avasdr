<?php
namespace App\Http\Controllers\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CursoMateriaRequest;

use App\Models\Curso;
use App\Models\Materia;
use App\Models\CursoMateria;
use DB;

class CursoMateriaController extends Controller {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $materias = Materia::all();
        $cursos = Curso::select('cursos.id', 'cursos.nome')->get();

        // Show the page
        return view('gestores.curso-materias.index', compact('cursos', 'materias'));
    }

    public function store(\Illuminate\Http\Request $request){
        if(strlen($request->materia_id) == 0) {
            CursoMateria::where('curso_id', '=', $request->curso_id)->delete();
            return redirect("/gestor/curso-materias");
        }
        $idMateriaRequest = explode("|", $request->materia_id);
        $materias = [];
        $materiasDelete = [];

        $materiasDoBanco = CursoMateria::select('curso_materias.materia_id')
            ->where('curso_id', '=', (int)$request->curso_id)
            ->get();

        foreach($materiasDoBanco as $banco) {
            if( !in_array($banco->materia_id, $idMateriaRequest) ) {
                array_push($materiasDelete,$banco->materia_id);
            }else {
                array_push($materias, $banco->materia_id);
            }
        }

        if(count($materiasDelete) > 0) {

            CursoMateria::whereIn('materia_id', $materiasDelete)->where('curso_id', '=', $request->curso_id)->delete();
        }

        $idMaterias = array_diff($idMateriaRequest, $materias);

        $materiasInserts = [];
        if(count($materias) == 0) {
            $idMaterias = $idMateriaRequest;
        }
        foreach($idMaterias as $idMateria) {
            array_push($materiasInserts, ['materia_id' => $idMateria, 'curso_id' => $request->curso_id]);
        }
        if(count($idMaterias) > 0) {
            CursoMateria::insert($materiasInserts);
        }

        return redirect("/gestor/curso-materias");
    }

    public function getMateriasRelacionadas($idCurso) {
        $dados['materias'] = DB::table('curso_materias')->select('materias.id', 'materias.nome')
            ->join('materias', 'materias.id', '=', 'curso_materias.materia_id')
            ->where('curso_materias.curso_id', '=', $idCurso)
            ->get();
        return response()->json($dados);

    }

}
