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
//        $this->belongsTo('User','owner','id');
        return $this->belongsTo('User','owner')->first();
    }

    public function screenshots()
    {
        return $this->hasMany('Screenshot');
    }
    function image($format='')
    {
        $img=$this->hasOne('Screenshot','id','image')->first();

        if(empty($img)){
            return 'please provide an image';
        }
        return '<img class="thumbnail" src="'.asset($img->path).'" alt="'.$img->caption.'"/>';


//        dd($this->image);
//        dd($this->screenshots()->findOrFail($this->image));
//        return $this->screenshots()->find();
    }
}