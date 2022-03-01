<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model {

	public $timestamps = false;

	protected $fillable = ['site_info_key', 'site_info_value'];

}
