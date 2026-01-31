<?php

namespace App\Domain;

use App\Models\User;

class UserDomain
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function canDeleteUser(User $user){
        return $user::__get('role') === 'admin';
    }

}
