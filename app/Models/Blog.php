<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'discription',
        'img_path',
        'user_id',
        'status',
    ];

    public function publish(array $data){
        if(empty($data['title'] ) && empty($data['discription']) && empty($data['user_id'] ) ){throw new Exception('Cannot create blog');};

        Blog::create($data);
    }

    
}
