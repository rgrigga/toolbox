<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = ['id'];

    public function hasPermission(Permission $permission)
    {
        $perms=$this->perms()->get();
        foreach($perms as $perm){
//            dd($perm->id);
            if($perm->id === $permission->id){
                return true;
            }
        }
        return false;
    }
    public function prepareRolesForSave( $roles )
    {
        $availableroles = $this->all()->toArray();
        $preparedroles = array();
        foreach( $roles as $role => $value )
        {
            // If checkbox is selected
            if( $value == 'on' )
            {
                // If role exists
                array_walk($availableroles, function(&$value) use($role, &$preparedroles){
                    if($role == (int)$value['id']) {
                        $preparedroles[] = $role;
                    }
                });
            }
        }
        return $preparedroles;
    }

}