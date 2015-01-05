<?php

class MeasurementUnits extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'measurement_units';

	protected $fillable = [];

	public function stock(){

		return $this->hasMany('Stock', 'id_measurement_unit', 'id');
		
	}

}