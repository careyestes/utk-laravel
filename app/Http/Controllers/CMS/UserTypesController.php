<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\UserType;
use DB;
use Request;
use Input;
use Redirect;

class UserTypesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userTypes  = DB::table('user_types')->orderBy('sort')->get();
		return view('cms/usertypes/listUserTypes', compact('userTypes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$userType = new UserType;

    if (Request::isMethod('post')) {
        $userType->type = Input::get('type');
        $userType->save();

        return Redirect::route('editUserType', array('id' => $userType->id))->with('message', '<p class="alert approved">User Type Created</p>');
    } else {
        return Redirect::route('editUserType', array('id' => $userType->id))->with('message', '<p class="alert denied">Something went wrong! Try again.</p>'); 
    }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id = null)
	{
		if(!$id) {
			$userType = new UserType;
		} else {
			$userType = UserType::find($id);
		}

    return view('cms/usertypes/editUserType', compact('userType'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

    if (Request::isMethod('post')) {
        
        $userType = UserType::updateOrCreate(array('id' => $id), array(
            'type'=> Input::get('type')
        ));

        return Redirect::route('editUserType', array('id' => $id))->with('message', '<p class="alert approved">User Type Updated</p>');
    } else {
        return Redirect::route('editUserType', array('id' => $id))->with('message', '<p class="alert denied">Something went wrong! Try again.</p>'); 
    }
	}

	public function updateOrder() {

		
		if(Request::ajax()) {

			$sortInput = Input::get('_sortList');

			$i     = 0;
			$total = count($sortInput);
			foreach($sortInput as $item) {

				$successful = DB::table('user_types')->where('type', '=', $item['type'])->update(array('sort' => $item['sort']));

			}

		} else {
			return Redirect::route('showUserType')->with('message', '<p class="alert denied">You tried to do something either malicious or incredibly stupid. Whatever is was, do not do it again please. Thanks!</p>');;
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$userType = UserType::destroy($id);

    if($userType) {
        return Redirect::route('showUserType')->with('message', '<p class="alert approved">User Type Deleted</p>');
    } else {
        return Redirect::route('editUserType')->with('message', '<p class="alert denied">Something went wrong. The event was not deleted. </p>');
    }
	}

}
