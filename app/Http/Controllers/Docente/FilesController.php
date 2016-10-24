<?php 
namespace App\Http\Controllers\Docente;
use App\Http\Controllers\Controller;
use App\Models\File;

class FilesController extends Controller {

	public function __construct() {

	}
	public function index()
	{
		return view('docentes.files.create_edit');
	}

	public function upload()
	{
		/**
		* Request related
		*/
		$file = \Request::file('documento');
		$userId = auth('docente')->user()->id;
		/**
		* Storage related
		*/
		$storagePath = public_path().'/documentos/'.$userId;
		$fileName = $file->getClientOriginalName();
		$fileNameCustom = date('dmY-his'). str_random(4).$fileName;
		/**
		* Database related
		*/
		$fileModel = new File();
		$fileModel->name = $fileNameCustom;
		$fileModel->original_name = $fileName;
		$fileModel->docente_id = $userId;
		$fileModel->save();
		return $file->move($storagePath, $fileNameCustom);
	}

	public function destroy(File $file) {
		$localFile = public_path().'/documentos/'.auth('docente')->user()->id.'/'.$file->name;
		
		unlink($localFile);
		$file->delete();
		return 'deleted';
	}

}