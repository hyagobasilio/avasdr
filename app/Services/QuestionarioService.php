<?php
namespace App\Services;
use App\Models\Resposta;

class QuestionarioService {
    
   public function getAcertoPorAluno($idQuestionario, $idAluno)
   {
       $quantidadeAcertos = 0;
            $respostas = Resposta::where('questionario_id', $idQuestionario)
                ->where('aluno_id', $idAluno)
                ->get();
            foreach($respostas as $resposta):
                if($resposta->questao->resposta == $resposta->resposta):
                    $quantidadeAcertos ++;
                endif;
            endforeach;
            
            return $quantidadeAcertos;
   }

   public function getQuestionariosByAluno($id) {

      return Questionario::whereExists(function ($query) use ($id) {
                $query->select(DB::raw(1))
                      ->from('aluno_turma')
                      ->whereRaw('aluno_turma.turma_id = questionarios.turma_id')
                      ->where('aluno_turma.aluno_id', $id);
            })
              ->where('vigencia', '>=', date('Y-m-d'))
              ->paginate(15);
   }
}