<?php

namespace App\Http\Controllers\Gestor;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use App\Models\Responsavel;
use App\Http\Requests\Gestor\MateriaEditRequest;
use App\Http\Requests\Gestor\ResponsavelRequest;
use App\Http\Requests\Gestor\DeleteRequest;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ResponsavelController extends Controller {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
      $responsaveis = Responsavel::paginate(15);
        // Show the page
        return view('gestores.responsavel.index', compact('responsaveis'));
    }
    public function view(Responsavel $responsavel)
    {
      return response()->json($responsavel);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('gestores.responsavel.create_edit');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ResponsavelRequest $request)
    {
      $responsavel = Responsavel::create($request->all());
      return redirect("/gestor/responsavel/".$responsavel->id);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $responsavel
     * @return Response
     */
    public function edit(Responsavel $responsavel) {
        return view('gestores.responsavel.create_edit', compact('responsavel'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param $responsavel
     * @return Response
     */
    public function update(ResponsavelRequest $request, Responsavel $responsavel) {
      if( $responsavel->update($request->all()) ) {
          return 'Atualizado com sucesso!';
      }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $materia
     * @return Response
     */
    public function delete(Responsavel $responsavel)
    {
        // Show the page
        return view('gestores.responsavel.delete', compact('responsavel'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $materia
     * @return Response
     */
    public function destroy(Responsavel $responsavel)
    {
     if($responsavel->delete())
     {
       return 'Deletado com sucesso!';
     }
    }

    public function getMae()
    {
      return $this->getResponsavelForAutocomplete('f');
    }

    public function getPai()
    {
      return $this->getResponsavelForAutocomplete('m');
    }
    public function getResponsavelForAutocomplete($sexo = null)
    {
      $responsavel = Responsavel::where('nome', 'like', Input::get('q').'%');

      if(!empty($sexo)) {
        $responsavel = $responsavel->where('sexo', $sexo);
      }
      $responsavel = $responsavel->get();
      return response()->json($responsavel);
    }

}
