<?php

namespace MyApp\Models;

/**
 * 
 */
class Client extends ModelBase
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/

	protected $fillable = [
		'name','email','phone'
	];
}