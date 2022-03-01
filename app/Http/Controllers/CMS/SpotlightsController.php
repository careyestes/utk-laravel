<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Model\Spotlight;
use App\Model\UserType;
use App\Model\FileEntry;
use Carbon\Carbon;
use Input;
use Request;
use Redirect;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class SpotlightsController extends Controller {

	public function show() {
		
		$spotlights = Spotlight::orderBy('updated_at', 'desc')->paginate(25);

		return view('cms/spotlights/viewSpotlights', compact('spotlights'));
	}

	public function edit($id = null) {

		$featured_image = null;

		$userTypes  = UserType::all();
		$selectUserTypes = convertForSelect($userTypes, 'id', 'type');

		if(Request::isMethod('post')) { 

			
			$featuredImageFile        = Request::file('featured_image');
			$featuredId = null;
			
			// Set the Featured binary
			$isFeatured = Input::get('featured');
			$isFeatured = isset($isFeatured) ? 1 : null;
	    
	    if($featuredImageFile) {

				$extension                = $featuredImageFile->getClientOriginalExtension();
				
				Storage::disk('local')->put($featuredImageFile->getFilename().'.'.$extension,  File::get($featuredImageFile));
				
				$fileEntry                    = new FileEntry;  	
				$fileEntry->mime              = $featuredImageFile->getClientMimeType();
				$fileEntry->caption           = null;
				$fileEntry->alt               = null;
				$fileEntry->title             = null;
				$fileEntry->original_filename = $featuredImageFile->getClientOriginalName();
				$fileEntry->filename          = $featuredImageFile->getFilename().'.'.$extension;
				$fileEntry->created_at        = Carbon::now();
				$fileEntry->updated_at        = Carbon::now();

				$fileEntry->save();
				
				$featuredId                   = $fileEntry->id;
	    } else {
	    	$featuredId = Input::get('featured_image');
	    }

	    
	    $spotlight = Spotlight::updateOrCreate(array('id' => $id), [
				'title'          => Input::get('title'),
				'subtitle'       => Input::get('subtitle'),
				'description'    => Input::get('description'),
				'link'           => Input::get('link'),
				'featured_image' => $featuredId,
				'updated_at'     => Carbon::now(),
				'user_id'        => Input::get('user_id')
      ]);
	    

			return Redirect::route('editSpotlight', array('id' => $spotlight->id))->with('message', '<p class="alert approved">Spotlight Updated</p>');
	  
	  }elseif($id) {

			$spotlight = Spotlight::firstOrNew(array('id' => $id));

			// grab the featured image object if it exists
			if($spotlight->featured_image) {
		    	$featured_image = FileEntry::find($spotlight->featured_image);
		  }
		
		}else {

	  	$spotlight = new Spotlight;
			
	  }
		return view('cms/spotlights/editSpotlight', compact('spotlight', 'selectUserTypes', 'featured_image'));
	}

	public function delete($id) {
		$spotlight = Spotlight::destroy($id);

		if($spotlight) {
        return Redirect::route('showSpotlight')->with('message', '<p class="alert approved">Spotlight Deleted</p>');
    } else {
        return Redirect::route('editSpotlight')->with('message', '<p class="alert denied">Something went wrong. The Spotlight was not deleted. </p>');
    }
	}

}
