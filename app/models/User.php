<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface {

    protected $rules=[
        'username'=>'required'
    ];
    use ConfideUser;
    use HasRole;

    //now use roles(),hosRole(),can(),ability()

//	/**
//	 * The database table used by the model.
//	 *
//	 * @var string
//	 */
//	protected $table = 'users';
//
//	/**
//	 * The attributes excluded from the model's JSON form.
//	 *
//	 * @var array
//	 */
//	protected $hidden = array('password', 'remember_token');

    function fullname(){
        if($this->username == 'ryan'){
            return "Ryan Grissinger";
        }
        else return $this->username;
    }

    function projects(){
        return $this->hasMany('Project','owner');
    }
    /**
     * Save roles inputted from multiselect
     * @param $inputRoles
     */
    public function saveRoles($inputRoles)
    {
        if(! empty($inputRoles)) {
            $this->roles()->sync($inputRoles);
        } else {
            $this->roles()->detach();
        }
    }
    function getUpdateRules(){
        return $this->rules;
    }
}
