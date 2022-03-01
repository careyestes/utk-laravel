<?php namespace App\Http\Controllers\CMS;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\AdminRole;
use DB;
use Request;
use Input;
use Redirect;

class AdminRolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$adminRoles  = DB::table('admin_roles')->orderBy('sort')->get();
		return view('cms/adminroles/listAdminRoles', compact('adminRoles'));
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$adminRole = new AdminRole;

    if (Request::isMethod('post')) {
        $adminRole->type = Input::get('type');
        $adminRole->save();

        return Redirect::route('editAdminRole', array('id' => $adminRole->id))->with('message', '<p class="alert approved">Admin Role Created</p>');
    } else {
        return Redirect::route('editAdminRole', array('id' => $adminRole->id))->with('message', '<p class="alert denied">Something went wrong! Try again.</p>'); 
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
			$adminRole = new AdminRole;
		} else {
			$adminRole = AdminRole::find($id);
		}

    return view('cms/adminroles/editAdminRole', compact('adminRole'));
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
        
        $adminRole = AdminRole::updateOrCreate(array('id' => $id), array(
            'type'=> Input::get('type')
        ));

        return Redirect::route('editAdminRole', array('id' => $id))->with('message', '<p class="alert approved">Admin Role Updated</p>');
    } else {
        return Redirect::route('editAdminRole', array('id' => $id))->with('message', '<p class="alert denied">Something went wrong! Try again.</p>'); 
    }
	}

	public function updateOrder() {

		
		if(Request::ajax()) {

			$sortInput = Input::get('_sortList');

			$i     = 0;
			$total = count($sortInput);
			foreach($sortInput as $item) {

				$successful = DB::table('admin_roles')->where('type', '=', $item['type'])->update(array('sort' => $item['sort']));

			}

		} else {
			return Redirect::route('showAdminRole')->with('message', '<p class="alert denied">You tried to do something either malicious or incredibly stupid. Whatever is was, do not do it again please. Thanks!</p>');;
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
		$adminRole = AdminRole::destroy($id);

    if($adminRole) {
        return Redirect::route('showAdminRoles')->with('message', '<p class="alert approved">User Type Deleted</p>');
    } else {
        return Redirect::route('editAdminRole')->with('message', '<p class="alert denied">Something went wrong. The event was not deleted. </p>');
    }
	}

}
