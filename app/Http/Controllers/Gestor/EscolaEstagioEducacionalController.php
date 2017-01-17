<?php
namespace App\Http\Controllers\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gestor\DocenteMateriaRequest;
use App\Models\DocenteMateria;
use App\Models\Escola;
use App\Models\EstagioEducacional;
use App\Models\EscolaEstagioEducacional;
use Illuminate\Support\Facades\DB;

class EscolaEstagioEducacionalController extends Controller {
  /*
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $escolas = Escola::all();
    $estagiosEducacionais = EstagioEducacional::all();

    // Show the page
    return view('gestores.escola-estagio-educacional.index', compact('escolas', 'estagiosEducacionais'));
  }

  public function store(\Illuminate\Http\Request $request){
    $idEstagiosRequest = explode("|", $request->estagio_ids);
    $inserts = [];
    if(strlen($request->estagio_ids) == 0) {
      DocenteMateria::where('escola_id', '=', (int)$request->escola_id)->delete();
      return redirect("/gestor/docente-materias");
    }
    // Seleciona todos os estágios da escola
    $estagios = EscolaEstagioEducacional::select('escolas_estagio_educacional.estagio_educacional')->where('escola_id','=', $request->escola_id)->get();
    $estagiosDelete= array();
    foreach($estagios as $banco) {
      if( !in_array($banco->estagio_educacional, $idEstagiosRequest) ) {
        $estagiosDelete[] = $banco->estagio_educacional;
      }else {
        $inserts[] = $banco->estagio_educacional;
      }
    }
    if(count($estagiosDelete) > 0) {
      // Deleta as escolas que não vieram na requisição
      EscolaEstagioEducacional::whereIn('estagio_educacional', $estagiosDelete)->where('escola_id', '=', (int)$request->escola_id)->delete();
    }
    // pega a diferença dos estagios que vieram na requisição e os do banco
    $idEstagios = array_diff($idEstagiosRequest, $inserts);

    $estagiosInserts = [];
    if(empty($inserts))
    $inserts = $idEstagiosRequest;

    foreach($idEstagios as $idEstagio) {
      $estagiosInserts[] = ['estagio_educacional' => $idEstagio, 'escola_id' => $request->escola_id];
    }
    if(!empty($inserts))
    EscolaEstagioEducacional::insert($estagiosInserts);
    return redirect("/gestor/escola-estagio-educacional");
  }

  public function getEstagiosRelacionados($idEscola) {
    $dados['estagios'] = DB::select(" SELECT m.id, m.nome FROM escolas_estagio_educacional pm, estagios_educacionais m WHERE
    pm.estagio_educacional = m.id AND pm.escola_id = $idEscola");

    return response()->json($dados);

  }

}
