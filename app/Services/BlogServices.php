<?php

namespace App\Services;

use App\Domain\BlogDomain;
use App\Models\Blog;
use DomainException;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Validator;

class BlogServices
{
    private BlogDomain $blogDomain;
    public function __construct(BlogDomain $domain)
    {
        $this->blogDomain = $domain;
    }

    public function createBlog(array $data)  {
       if($this->blogDomain->canCreateBlog() === false){
        throw new DomainException('Cannot create blog');
       };

    $validator =   Validator::make($data, [
                            'title' => 'required|string|max:5',
                            'discription'=> 'required|string',
                            'img_path' => 'image|max:2048|mimes:jpg,jpeg,png',
                     ]);

                    if($validator->fails()){
                        throw new ValidationException($validator->messages());
                    }
                    return Blog::create($validator->validated());
        
    }
    public function updateBlog(array $data) : bool {
        
        if($this->blogDomain->canUpdateBlog())
    }

    public function deleteBlog() : bool {
        
    }

    public function all(){}
    public function getBy() : Blog {
        
    }

}
