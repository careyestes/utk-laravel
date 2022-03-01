<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\HomepageStories;
use App\Model\SiteInfo;
use App\Model\FileEntry;
use App\Model\UserType;
use DB;

use Illuminate\Http\Request;

class homepageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get the Featured Homepage Story
		$featuredHomepageStory = HomepageStories::whereFeatured('1')->first();
		
		if($featuredHomepageStory) {

			$featuredHomepageStoryImage = FileEntry::find($featuredHomepageStory->featured_image);
			
		}

		// Get User Types
		$userTypes = DB::table('user_types')->orderBy('sort')->get();

		// Get Site Info
		$homepageTitle   = SiteInfo::where('site_info_key', '=', 'Homepage Subtitle')->first();
		$homepageSubtext = SiteInfo::where('site_info_key', '=', 'Homepage Subtext')->first();


		return view('frontend/index', compact('featuredHomepageStory', 'featuredHomepageStoryImage', 'homepageTitle', 'homepageSubtext', 'userTypes'));
	}

}
