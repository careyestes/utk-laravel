<?php

class IndexController extends Controller {

	public function getIndex()
	{
		$users = User::all();
        return View::make('index')->with('users', $users);
	}


}
