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
}