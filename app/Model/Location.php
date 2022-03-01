<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

	protected $fillable = ['name', 'address', 'city', 'state', 'country', 'zip', 'lat', 'lon', 'url', 'phone_1', 'phone_2', 'email', 'description', 'is_published', 'created_at', 'updated_at'];

}
