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

}