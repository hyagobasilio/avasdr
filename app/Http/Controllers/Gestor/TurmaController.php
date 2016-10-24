<?php 
namespace App\Http\Controllers\Gestor;

use App\Models\Turma;
use App\Http\Requests\Gestor\TurmaEditRequest;
use App\Http\Requests\Gestor\TurmaRequest;
use App\Http\Requests\Gestor\DeleteRequest;
use Datatables;
use App\Http\Controllers\Controller;

class TurmaController extends Controller {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $turmas = Turma::paginate(15);
        
        return view('gestores.turmas.index', compact('turmas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        return view('gestores.turmas.create_edit');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(TurmaRequest $request) {

        dd($request->all());
        $turma = new Turma();
        $turma->nome = $request->nome;
        $turma->ativo = $request->has('ativo');


        if($turma->save()) {
            return redirect("/gestor/turmas");
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $turma
     * @return Response
     */
    public function getEdit($id) {
        $turma = Turma::find($id);
        return view('gestores.turmas.create_edit', compact('turma'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param $turma
     * @return Response
     */
    public function postEdit(TurmaEditRequest $request, $id) {
        $turma = Turma::find($id);
        $turma->nome = $request->nome;
        $turma->ativo = $request->has('ativo');

        if($turma->save()) {
            return redirect("/gestor/turmas/$id/edit");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $turma
     * @return Response
     */
    public function getDelete($id)
    {
        $turma = Turma::find($id);
        // Show the page
        return view('gestores.turmas.delete', compact('user'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $turma
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $turma= Turma::find($id);
        $turma->delete();
    }
    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $materias = Turma::select(array('turmas.id','turmas.nome'));
        return Datatables::of($materias)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/turmas/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                    <a href="{{{ URL::to(\'admin/turmas/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> Delete</a>
               ')
            ->remove_column('id')
            ->make();
    }
}