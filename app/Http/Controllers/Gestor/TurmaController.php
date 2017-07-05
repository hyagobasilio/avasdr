<?php
namespace App\Http\Controllers\Gestor;

use App\Models\Turma;
use App\Models\Curso;
use App\Models\Turno;
use App\Http\Requests\Gestor\TurmaEditRequest;
use App\Http\Requests\Gestor\TurmaRequest;
use App\Http\Requests\Gestor\DeleteRequest;
use Datatables;
use App\Http\Controllers\Controller;

class TurmaController extends Controller {

    public function __construct(){}
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
    public function create()
    {
        $cursos = Curso::pluck('nome', 'id')->prepend('Selecione');
        $turnos = Turno::pluck('nome', 'id')->prepend('Selecione');
        return view('gestores.turmas.create_edit', compact('cursos', 'turnos'));
    }

    public function show(Turma $turma)
    {
        return view('gestores.turmas.show', compact('turma'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TurmaRequest $request)
    {
        Turma::create($request->all());

        return redirect("/gestor/turmas");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $turma
     * @return Response
     */
    public function edit(Turma $turma)
    {
        $cursos = Curso::pluck('nome', 'id')->prepend('Selecione');
        $turnos = Turno::pluck('nome', 'id')->prepend('Selecione');
        return view('gestores.turmas.create_edit', compact('turma', 'cursos', 'turnos'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param $turma
     * @return Response
     */
    public function update(TurmaRequest $request, Turma $turma)
    {
        $turma->update($request->all());

        return redirect("/gestor/turmas");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $turma
     * @return Response
     */
    public function delete(Turma $turma)
    {
        // Show the page
        return view('gestores.turmas.delete', compact('turma'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $turma
     * @return Response
     */
    public function destroy(Turma $turma)
    {
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

    public function getSeriesByCurso(Curso $curso)
    {
        return $curso->series;
    }
    public function getMatrizesByCurso(Curso $curso)
    {
        return $curso->matrizes;
    }
}
