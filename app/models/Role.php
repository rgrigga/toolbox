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
}