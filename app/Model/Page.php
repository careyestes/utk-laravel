<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	protected $fillable = ['title', 'slug', 'description', 'user_id'];

}
