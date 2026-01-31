<?php

namespace App\Domain;

use App\Models\Blog;
use App\Models\User;
use function PHPUnit\Framework\returnArgument;

class BlogDomain
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function canCreateBlog(): bool
    {
        return request()->user()->role === 'user';
    }

    public function canUpdateBlog(Blog $blog)
    {
        return request()->user()->role === 'user' && $blog::__get('user_id')===request()->user()->id;

    }
    function canDeleteBlog(int $user_id): bool
    {
        return request()->user()->id === $user_id;
    }


}
