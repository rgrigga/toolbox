<?php

class Screenshot extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
//    protected $guarded = ['id'];
    protected $fillable = ['path','caption'];

    function project(){
        return $this->belongsTo('Project');
    }
}