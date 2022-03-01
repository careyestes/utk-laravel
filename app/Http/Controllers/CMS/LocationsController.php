<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Model\Location;
use App\Model\UserType;
use Carbon\Carbon;
use Input;
use Request;
use Redirect;

class LocationsController extends Controller {
	public function showLocations() {
		$locations = Location::orderBy('name', 'asc')->paginate(25);
		return view('cms/locations/viewLocations')->with('locations', $locations);
	}

	public function editLocation($id = null) {

		// Get the user types to associate to a location
		$userTypes  = UserType::all();
		// We have to convert the JSON to an array for the Form Select html element
		$selectUserTypes = convertForSelect($userTypes, 'id', 'type');

		if(Request::isMethod('post')) { 
	    
	    $location = Location::updateOrCreate(array('id' => $id), [
						'name'         => Input::get('name'),
						'address'      => Input::get('address'),
						'city'         => Input::get('city'),
						'state'        => Input::get('state'),
						'country'      => Input::get('country'),
						'zip'          => Input::get('zip'),
						'lat'          => Input::get('lat'),
						'lon'          => Input::get('lon'),
						'url'          => Input::get('url'),
						'phone_1'      => Input::get('phone_1'),
						'phone_2'      => Input::get('phone_2'),
						'email'        => Input::get('email'),
						'description'  => Input::get('description'),
						'is_published' => 1,
						'created_at'   => Carbon::now(),
						'updated_at'   => Carbon::now()
	        ]);

			return Redirect::route('editLocation', array('id' => $location->id))->with('message', '<p class="alert approved">Location Updated</p>');
	  
	  } 

		// Are we directly querying a record? If so, an ID should exist. Find by ID
		elseif($id) {

			$location = Location::firstOrNew(array('id' => $id));
		
		}
	  // None of the above? Ok, then we will just create a brand new record.
	  else {

	  	$location = new Location;
			
	  }
		return view('cms/locations/editLocation', compact('location', 'selectUserTypes'));
	}

	public function deleteLocation($id) {
		$location = Location::destroy($id);

		if($location) {
        return Redirect::route('showLocations')->with('message', '<p class="alert approved">Location Deleted</p>');
    } else {
        return Redirect::route('editLocation')->with('message', '<p class="alert denied">Something went wrong. The location was not deleted. </p>');
    }
	}

}