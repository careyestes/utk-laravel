<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HomepageStories extends Model {

	protected $fillable = ['title', 'slug', 'featured_image', 'description', 'user_id', 'featured'];

}
