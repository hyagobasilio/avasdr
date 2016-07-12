<?php 
namespace App\Http\Controllers\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gestor\DocenteMateriaRequest;
use App\Models\DocenteMateria;
use App\Models\Materia;
use App\Docente;
use Illuminate\Support\Facades\DB;

class DocenteMateriaController extends Controller {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $docentees = Docente::select('docentes.id', 'docentes.name')->get();
        $materias = Materia::all();

        // Show the page
        return view('gestores.docentematerias.index', compact('docentees', 'materias'));
    }
    public function postCreate(\Illuminate\Http\Request $request){
        $idMateriasRequest = explode("|", $request->idsMaterias);
        $inserts = [];
        if(strlen($request->idsMaterias) == 0) {
            DocenteMateria::where('docente_id', '=', (int)$request->docente_id)->delete();
            return redirect("/gestor/docente-materias");
        }
        $materias = DocenteMateria::select('docente_materia.materia_id')->where('docente_id','=', $request->docente_id)->get();
        $materiasDelete= array();
        foreach($materias as $banco) {
            if( !in_array($banco->materia_id, $idMateriasRequest) ) {
                $materiasDelete[] = $banco->materia_id;
            }else {
                $inserts[] = $banco->materia_id;
            }
        }
        if(count($materiasDelete) > 0) {
            DocenteMateria::whereIn('materia_id', $materiasDelete)->where('docente_id', '=', (int)$request->docente_id)->delete();
        }
        $idMaterias = array_diff($idMateriasRequest, $inserts);

        $materiasInserts = [];
        if(empty($inserts))
            $inserts = $idMateriasRequest;

        foreach($idMaterias as $idMateria) {
            $materiasInserts[] = ['materia_id' => $idMateria, 'docente_id' => $request->docente_id];
        }
        if(!empty($inserts))
            DocenteMateria::insert($materiasInserts);


        return redirect("/gestor/docente-materias");
    }

    public function getMateriasRelacionadas($idDocente) {
        $dados['materias'] = DB::select(" SELECT m.id, m.nome FROM docente_materia pm, materias m WHERE
                                          pm.materia_id = m.id AND pm.docente_id = $idDocente");

        return response()->json($dados);

    }

}