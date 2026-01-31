<?php

namespace App\Services;

use App\Domain\UserDomain;
use App\Models\User;
use DomainException;
use phpDocumentor\Reflection\PseudoTypes\False_;
use function PHPUnit\Framework\returnArgument;

class UserServices
{
    private $userDomain;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->userDomain = new UserDomain();
    }

    public function deleteUser(User $user) : bool {
       //user details with the request user
       //$user has user details to be deleted
       //request is assumed to be done from admin

     $status =  $this->userDomain->canDeleteUser($user);
     if($status === False) {throw new DomainException('Cannot delete user');};
       
     return  User::delete($user::__get('id'));
        
    }
}
