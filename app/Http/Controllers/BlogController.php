<?php

namespace App\Http\Controllers;

use App\Models\Blog;
// use App\Services\BlogServices;
use App\Policies\BlogPolicy;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   private $blogPolicy;

    public function __construct(BlogPolicy $policy){
        $this->blogPolicy = $policy;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index', ['user' => request()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $status =  $this->blogPolicy->create(request()->user());
    if($status === false){
            return redirect('/blog', 403);
    }
    return view('blog.create');

     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
         return view('blog.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
