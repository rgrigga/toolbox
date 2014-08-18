<?php

class Project extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = ['id'];

    public function owner()
    {
        return $this->belongsTo('User','owner','user_id');
    }

}