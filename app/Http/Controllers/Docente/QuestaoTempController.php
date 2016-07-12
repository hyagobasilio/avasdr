<?php
namespace App\Http\Controllers\Docente;
use App\Http\Controllers\Controller;
use App\Models\QuestaoTemp;

class QuestaoTempController extends Controller 
{

    public function destroy($idTemp)
    {
        $q = QuestaoTemp::find($idTemp);
        $q->delete();
        return back();
    }

    public function store(\Illuminate\Http\Request $request)
    {   
        $idDocente = auth()->guard('docente')->user()->id;
        $questao = QuestaoTemp::where('questao_id', $request->get('id'))
                ->where('docente_id' , $idDocente)
                ->get() ;
        if (count($questao)) {
            return response()->json(['message' => 'Questão já adicionada!']);
        }
        
        QuestaoTemp::create(['questao_id' => $request->get('id'), 
            'docente_id' => $idDocente]);
        return response()->json(['message' => 'salvo com sucesso!']);
    }
}