<?php

class Categories extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	protected $fillable = [];

	public function materials(){

		return $this->hasMany('Materials', 'id_category', 'id');

	}

}