<?php namespace App\Http\Controllers\CMS;

use App\Model\FileEntry;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

use Illuminate\Http\Request;

class FileEntryController extends Controller {

	public function get($filename){
	
		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
		// $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().$file;
 
		return (new Response($file, 200))->header('Content-Type', $entry->mime);
	}

	public function getEditorImages($filename){
	
		// $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($filename);
		// $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().$file;
 
		return (new Response($file, 200))->header('Content-Type', '.jpg');
	}

	public function upload() {
		$file = Request::file('upload');
		var_dump($file);
		return;
	}

}
