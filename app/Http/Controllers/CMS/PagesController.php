<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Model\Page;
use App\Model\UserType;
use Carbon\Carbon;
use Input;
use Request;
use Redirect;

class PagesController extends Controller {
	public function showPages() {
		
		$pages = Page::orderBy('updated_at')->paginate(25);

		return view('cms/pages/viewPages', compact('pages'));
	}


	public function editpage($id = null) {

		$userTypes  = UserType::all();
		$selectUserTypes = convertForSelect($userTypes, 'id', 'type');

		if(Request::isMethod('post')) { 
	    
	    $page = Page::updateOrCreate(array('id' => $id), [
	          'title' => Input::get('title'),
	          'slug' => Input::get('slug'),
	          'description' => Input::get('description'),
	          'created_at' => Carbon::now(),
	          'updated_at' => Carbon::now(),
	          'user_id' => Input::get('user_id')
	        ]);

			return Redirect::route('editPage', array('id' => $page->id))->with('message', '<p class="alert approved">page Updated</p>');
	  
	  }elseif($id) {

			$page = Page::firstOrNew(array('id' => $id));
		
		}else {

	  	$page = new Page;
			
	  }
		return view('cms/pages/editPage', compact('page', 'selectUserTypes'));
	}

	public function deletepage($id) {
		$page = Page::destroy($id);

		if($page) {
        return Redirect::route('showPages')->with('message', '<p class="alert approved">page Deleted</p>');
    } else {
        return Redirect::route('editPage')->with('message', '<p class="alert denied">Something went wrong. The page was not deleted. </p>');
    }
	}

}