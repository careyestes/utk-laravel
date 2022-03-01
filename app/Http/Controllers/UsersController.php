<?php namespace App\Http\Controllers;

use App\Model\User;
use App\Model\UserType;
use App\Model\AdminRole;
use Carbon\Carbon;
use Input;
use Hash;
use Request;
use Redirect;

class UsersController extends Controller {

	public function showUsers()
	{
		$users = User::paginate(25);

        return view('cms/users/viewUsers')->with('users', $users);
	}

    public function editUser($id = null) {
        
        $user       = User::firstOrNew(array('id' => $id));
        $userTypes  = UserType::all();
        $adminRoles = AdminRole::all();

        $selectUserTypes = convertForSelect($userTypes, 'id', 'type');

        $selectAdminRoles = convertForSelect($adminRoles, 'id', 'type');

        return view('cms/users/editUser', compact('user', 'selectUserTypes', 'selectAdminRoles'));
    }

    public function newUser() {
        $user = new User;

        $hashedPassword = $this->hashPassword(Input::get('password'), Input::get('confirm_password'));

        if (Request::isMethod('post')) {

            $user = $user::create([
                  'email'=> Input::get('email'),
                  'name' => Input::get('name'),
                  'password' => $hashedPassword,
                  'user_id' => Input::get('user_id'),
                  'admin_id' => Input::get('admin_id'),
                  'created_at' => Carbon::now(),
                  'updated_at' => Carbon::now(),
                ]);

            return Redirect::route('editUser', array('id' => $user->id))->with('message', '<p class="alert approved">User Created</p>');
        } else {
            return Redirect::route('editUser', array('id' => $user->id))->with('message', '<p class="alert denied">Something went wrong! Try again.</p>'); 
        }
    }

    public function updateUser($id) {

        $hashedPassword = $this->hashPassword(Input::get('password'), Input::get('confirm_password'));
        if(!$hashedPassword) {
            return Redirect::route('editUser', array('id' => $id))->with('message', '<p class="alert denied">Passwords did not match.</p>');
        }

        if (Request::isMethod('post')) {
            
            $user = User::updateOrCreate(array('id' => $id), array(
                'email'=> Input::get('email'),
                'name' => Input::get('name'),
                'password' => $hashedPassword,
                'user_id' => Input::get('user_id'),
                'admin_id' => Input::get('admin_id'),
                'updated_at' => Carbon::now(),
            ));

            
            return Redirect::route('editUser', array('id' => $id))->with('message', '<p class="alert approved">User Updated</p>');
        } else {
            return Redirect::route('editUser', array('id' => $id))->with('message', '<p class="alert denied">Something went wrong! Try again.</p>'); 
        }
    }

    public function deleteUser($id) {
        $user = User::destroy($id);

        if($user) {
            return Redirect::route('showUsers')->with('message', '<p class="alert approved">Event Deleted</p>');
        } else {
            return Redirect::route('editUser')->with('message', '<p class="alert denied">Something went wrong. The event was not deleted. </p>');
        }
    }

    private function hashPassword($pwd, $confirmedPwd) {
        
        if($pwd != $confirmedPwd) {
            return null;
        } else {
            $hashedPassword = Hash::make($pwd);
            return $hashedPassword;
        }


    }

}
