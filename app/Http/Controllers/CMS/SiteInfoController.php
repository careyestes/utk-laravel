<?php namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Model\SiteInfo;
use Carbon\Carbon;
use DB;
use Input;
use Request;
use Redirect;

use Illuminate\Http\Response;

class SiteInfoController extends Controller {

	public function edit() {

		$type = false;
		if(\Auth::check()) {
			$user = \Auth::user();
      $role = $user->adminRole->type;
    }

		if(Request::isMethod('post')) { 

			$i     = 0;
			$total = Input::get('count');
			while($i <= $total) {
				DB::table('site_infos')->where('site_info_key', Input::get('site_info_key_'.$i))->update(['site_info_value' => Input::get('site_info_value_'.$i)]);
				$i++;
			}


		}

		$siteInfos = SiteInfo::all();
		$count = $siteInfos->count() - 1;

	  return view('cms/siteinfo/editSiteInfo', compact('siteInfos', 'role', 'count'));

	}

	public function add() {

		$siteInfo = new SiteInfo;

		return view('cms/siteinfo/addSiteInfo', compact('siteInfo'));

	}

	public function insert() {

		if(Request::isMethod('post')) { 

				$newSiteInfo = SiteInfo::updateOrCreate([
				'site_info_key'   => Input::get('site_info_key'),
				'site_info_value' => Input::get('site_info_value')
				]);

		} 
		
		return Redirect::route('editSiteInfo');
		

	}

}
