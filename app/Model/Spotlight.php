<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spotlight extends Model {

	protected $fillable = ['title', 'subtitle', 'description', 'link', 'featured_image', 'user_id'];

}
