<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* CMS */
Route::group(array('middleware' => 'auth'), function() {

	Route::get('/cms', array('as' => 'showDashboard', 'uses' => 'DashboardController@showDashboard'));

	// Admin Roles
	Route::get('cms/adminroles', array('as' => 'showAdminRole', 'uses' => 'CMS\AdminRolesController@index'));
	Route::get('cms/adminroles/create', array('as' => 'createAdminRole', 'uses' => 'CMS\AdminRolesController@edit'));
	Route::post('cms/adminroles/new', array('as' => 'addNewAdminRole', 'uses' => 'CMS\AdminRolesController@create'));
  Route::any('cms/adminroles/updateorder', array( 'as' => 'updateAdminRoleOrder', 'uses' => 'CMS\AdminRolesController@updateOrder'));
	Route::get('cms/adminroles/{id}', array( 'as' => 'editAdminRole', 'uses' => 'CMS\AdminRolesController@edit'));
	Route::post('cms/adminroles/{id}/update', array( 'as' => 'updateAdminRole', 'uses' => 'CMS\AdminRolesController@update'));
	Route::get('cms/adminroles/{id}/delete', array( 'as' => 'deleteAdminRole', 'uses' => 'CMS\AdminRolesController@destroy'));

	// Events
  Route::get('cms/events', array('as' => 'showEvent', 'uses' => 'EventsController@showAllEvents'));
  Route::get('cms/events/add', array( 'as' => 'addEvent', 'uses' => 'EventsController@editEvent'));
  Route::get('cms/events/id/{id}', array( 'as' => 'editEvent', 'uses' => 'EventsController@editEvent'));
  Route::get('cms/events/{id}/delete', array( 'as' => 'deleteEvent', 'uses' => 'EventsController@deleteEvent'));
  Route::post('cms/events/{id}/update', array( 'as' => 'updateEvent', 'uses' => 'EventsController@updateEvent'));
  Route::post('cms/events/new', array( 'as' => 'addNewEvent', 'uses' => 'EventsController@newEvent'));
  Route::post('cms/events/category/{slug}', array( 'as' => 'categoryEvent', 'uses' => 'EventsController@showCategoryEvent'));

  
  // Homepage Stories
  Route::get('cms/homepagestories', array( 'as' => 'showHomepageStory', 'uses' => 'CMS\HomepageStoriesController@show'));
  Route::get('cms/homepagestories/create', array( 'as' => 'createHomepageStory', 'uses' => 'CMS\HomepageStoriesController@edit'));
  Route::post('cms/homepagestories/new', array( 'as' => 'addNewHomepageStory', 'uses' => 'CMS\HomepageStoriesController@edit'));
  Route::any('cms/homepagestories/{id}', array( 'as' => 'editHomepageStory', 'uses' => 'CMS\HomepageStoriesController@edit'));
  Route::post('cms/homepagestories/{id}/update', array( 'as' => 'updateHomepageStory', 'uses' => 'CMS\HomepageStoriesController@edit'));
  Route::get('cms/homepagestories/{id}/delete', array( 'as' => 'deleteHomepageStory', 'uses' => 'CMS\HomepageStoriesController@delete'));


  // Site Info
  Route::any('cms/siteinfo', array( 'as' => 'editSiteInfo', 'uses' => 'CMS\SiteInfoController@edit'));
  Route::any('cms/siteinfo/add', array( 'as' => 'addSiteInfo', 'uses' => 'CMS\SiteInfoController@add'));
  Route::any('cms/siteinfo/insert', array( 'as' => 'insertSiteInfo', 'uses' => 'CMS\SiteInfoController@insert'));

  // Spotlights
  Route::get('cms/spotlights', array( 'as' => 'showSpotlight', 'uses' => 'CMS\SpotlightsController@show'));
  Route::get('cms/spotlights/create', array( 'as' => 'createSpotlight', 'uses' => 'CMS\SpotlightsController@edit'));
  Route::post('cms/spotlights/new', array( 'as' => 'addSpotlight', 'uses' => 'CMS\SpotlightsController@edit'));
  Route::any('cms/spotlights/{id}', array( 'as' => 'editSpotlight', 'uses' => 'CMS\SpotlightsController@edit'));
  Route::post('cms/spotlights/{id}/update', array( 'as' => 'updateSpotlight', 'uses' => 'CMS\SpotlightsController@edit'));
  Route::get('cms/spotlights/{id}/delete', array( 'as' => 'deleteSpotlight', 'uses' => 'CMS\SpotlightsController@delete'));

  // Locations
  Route::get('cms/locations', array( 'as' => 'showLocation', 'uses' => 'CMS\LocationsController@showLocations'));
  Route::get('cms/locations/create', array( 'as' => 'createLocation', 'uses' => 'CMS\LocationsController@editLocation'));
  Route::post('cms/locations/new', array('as' => 'addNewLocation', 'uses' => 'CMS\LocationsController@editLocation'));
  Route::get('cms/locations/{id}', array( 'as' => 'editLocation', 'uses' => 'CMS\LocationsController@editLocation'));
  Route::post('cms/locations/{id}/update', array( 'as' => 'updateLocation', 'uses' => 'CMS\LocationsController@editLocation'));
  Route::get('cms/locations/{id}/delete', array( 'as' => 'deleteLocation', 'uses' => 'CMS\LocationsController@deleteLocation'));


  // Pages
  Route::get('cms/pages', array( 'as' => 'showPage', 'uses' => 'CMS\PagesController@showPages'));
  Route::get('cms/pages/create', array( 'as' => 'createPage', 'uses' => 'CMS\PagesController@editPage'));
  Route::post('cms/pages/new', array( 'as' => 'addNewPage', 'uses' => 'CMS\PagesController@editPage'));
  Route::get('cms/pages/{id}', array( 'as' => 'editPage', 'uses' => 'CMS\PagesController@editPage'));
  Route::post('cms/pages/{id}/update', array( 'as' => 'updatePage', 'uses' => 'CMS\PagesController@editPage'));
  Route::get('cms/pages/{id}/delete', array( 'as' => 'deletePage', 'uses' => 'CMS\PagesController@deletePage'));

	// Users
	Route::get( 'cms/users', array( 'as' => 'showUser', 'uses' => 'UsersController@showUsers'));
	Route::get( 'cms/users/create', array('as' => 'createUser', 'uses' => 'UsersController@editUser'));
	Route::post('cms/users/new', array('as' => 'addNewUser', 'uses' => 'UsersController@newUser'));
	Route::get( 'cms/users/{id}', array( 'as' => 'editUser', 'uses' => 'UsersController@editUser'));
	Route::post('cms/users/{id}/update', array( 'as' => 'updateUser', 'uses' => 'UsersController@updateUser'));
	Route::get('cms/users/{id}/delete', array( 'as' => 'deleteUser', 'uses' => 'UsersController@deleteUser'));

	// User Types
	Route::get('cms/usertypes', array('as' => 'showUserType', 'uses' => 'CMS\UserTypesController@index'));
	Route::get('cms/usertypes/create', array('as' => 'createUserType', 'uses' => 'CMS\UserTypesController@edit'));
	Route::post('cms/usertypes/new', array('as' => 'addNewUserType', 'uses' => 'CMS\UserTypesController@create'));
	Route::any('cms/usertypes/updateorder', array( 'as' => 'updateUserTypeOrder', 'uses' => 'CMS\UserTypesController@updateOrder'));
  Route::get('cms/usertypes/{id}', array( 'as' => 'editUserType', 'uses' => 'CMS\UserTypesController@edit'));
  Route::post('cms/usertypes/{id}/update', array( 'as' => 'updateUserType', 'uses' => 'CMS\UserTypesController@update'));
	Route::get('cms/usertypes/{id}/delete', array( 'as' => 'deleteUserType', 'uses' => 'CMS\UserTypesController@destroy'));


});





/* FRONTEND */


Route::get('/', [ 'as' => 'showIndex', 'uses' => 'Frontend\homepageController@index' ]);

Route::get('/login', function() {
	return View::make('frontend/login');
});

Route::post('/login', function() {
	$creds = Input::only('email', 'password');
	if(Auth::attempt($creds)) {
		return Redirect::intended('/cms');
	} else {
		return Redirect::to('/login')->with('message', '<p class="alert denied">Login Failed</p>');
	}
});

Route::get('/logout', function() {
	Auth::logout();
	return View::make('frontend/logout');
});


// Images
Route::get('assets/{filename}', [ 'as' => 'getentry', 'uses' => 'CMS\FileEntryController@get']);
Route::get('images/{filename}', [ 'as' => 'getentry', 'uses' => 'CMS\FileEntryController@getEditorImages']);
		






