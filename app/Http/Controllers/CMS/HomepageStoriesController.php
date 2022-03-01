<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Model\HomepageStories;
use App\Model\UserType;
use App\Model\FileEntry;
use Carbon\Carbon;
use Input;
use Request;
use Redirect;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class HomepageStoriesController extends Controller {

	public function show() {
		
		$homepageStories = HomepageStories::orderBy('updated_at')->paginate(25);

		return view('cms/homepagestories/viewHomepageStories', compact('homepageStories'));
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

	    
	    $homepageStory = HomepageStories::updateOrCreate(array('id' => $id), [
				'title'          => Input::get('title'),
				'slug'           => Input::get('slug'),
				'featured_image' => $featuredId,
				'description'    => Input::get('description'),
				'created_at'     => Carbon::now(),
				'updated_at'     => Carbon::now(),
				'user_id'        => Input::get('user_id'),
				'featured'       => $isFeatured
      ]);
	    

			return Redirect::route('editHomepageStory', array('id' => $homepageStory->id))->with('message', '<p class="alert approved">Homepage Story Updated</p>');
	  
	  }elseif($id) {

			$homepageStory = HomepageStories::firstOrNew(array('id' => $id));

			// grab the featured image object if it exists
			if($homepageStory->featured_image) {
		    	$featured_image = FileEntry::find($homepageStory->featured_image);
		  }
		
		}else {

	  	$homepageStory = new HomepageStories;
			
	  }
		return view('cms/homepagestories/editHomepageStories', compact('homepageStory', 'selectUserTypes', 'featured_image'));
	}

	public function delete($id) {
		$homepageStory = HomepageStories::destroy($id);

		if($homepageStory) {
        return Redirect::route('showHomepageStory')->with('message', '<p class="alert approved">Homepage Story Deleted</p>');
    } else {
        return Redirect::route('editHomepageStory')->with('message', '<p class="alert denied">Something went wrong. The Homepage Story was not deleted. </p>');
    }
	}

}
