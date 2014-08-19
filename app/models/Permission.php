<?php

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = ['id'];
    /**
     * The Permission model has two attributes: name and display_name. name, as you can imagine, is the name of the Permission. For example: "Admin", "Owner", "Employee", "can_manage". display_name is a viewer friendly version of the permission string. "Admin", "Can Manage", "Something Cool".
     */

    function hasRole(Role $role){
        foreach($this->roles() as $myrole)
        {
            if($myrole == $role){
                return true;
            }
        }
    }
    public function preparePermissionsForDisplay($permissions)
    {
        // Get all the available permissions
        $availablePermissions = $this->all()->toArray();

        foreach($permissions as &$permission) {
            array_walk($availablePermissions, function(&$value) use(&$permission){
                if($permission->name == $value['name']) {
                    $value['checked'] = true;
                }
            });
        }
        return $availablePermissions;
    }

    /**
     * Convert from input array to savable array.
     * @param $permissions
     * @return array
     */
    public function preparePermissionsForSave( $permissions )
    {
        $availablePermissions = $this->all()->toArray();
        $preparedPermissions = array();
        foreach( $permissions as $permission => $value )
        {
            // If checkbox is selected
            if( $value == 'on' )
            {
                // If permission exists
                array_walk($availablePermissions, function(&$value) use($permission, &$preparedPermissions){
                    if($permission == (int)$value['id']) {
                        $preparedPermissions[] = $permission;
                    }
                });
            }
        }
        return $preparedPermissions;
    }
}