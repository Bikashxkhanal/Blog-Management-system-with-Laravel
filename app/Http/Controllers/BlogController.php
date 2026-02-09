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
    $user = request()->user(); // currently logged-in user

    // Start the query with eager loading
    $query = Blog::with('user')->orderBy('created_at', 'desc');

    // Filter: normal users see only active blogs
    if ($user->role !== 'admin') {
        $query->where('status', 'active'); // assuming 'active' is the value for active blogs
    }

    // Paginate the results
    $blogs = $query->paginate(7);

    // Return view
    return view('blog.index', [
        'blogs' => $blogs,
        'user' => $user,
    ]);
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
     $validatedData =  $request->validate([
        'title' => 'required|string|max:255',
         'discription' => 'required|string',
         'blog_img' => 'nullable|image|mime:jpeg,jpg,png|max:2048',
      ]);

     if( $request->hasFile('blog_img')){
        $imageName = time().'_'.$request->blog_img->getClientOriginalName();
        $request->blog_img->move(public_path('uploads/blog_imgs'), $imageName);
        $validatedData['img_path'] = $imageName;
        

     }
     $validatedData['user_id'] = $request->user()->id;
         $blog=   Blog::create($validatedData);
        return to_route('blog.show', parameters: $blog)->with('message', 'Blog created successfully!');

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
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in st  orage.
     */
    public function update(Request $request, Blog $blog)
{
    
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'discription' => 'required|string',
        'blog_img' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    if ($request->hasFile('blog_img')) {
        // Delete old image if exists
        if ($blog->img_path && file_exists(public_path('uploads/blog_imgs/' . $blog->img_path))) {
            unlink(public_path('uploads/blog_imgs/' . $blog->img_path));
        }

        $imageName = time() . '_' . $request->blog_img->getClientOriginalName();
        $request->blog_img->move(public_path('uploads/blog_imgs'), $imageName);
        $validatedData['img_path'] = $imageName;
    }


    $validatedData['user_id'] = $blog->user_id;

    
    $blog->update($validatedData);

    return to_route('blog.show', $blog)->with('message', 'Blog updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
       $user =  request()->user();
     $status =   $this->blogPolicy->delete($user, $blog);
     if($status === false){
        abort(403, "Unauthorized action");
     }
    $blog->delete();

    return to_route('blog.personal')->with('message', "Blog deleted successfully");

    }

    public function personal(){
        $user = request()->user();
        $blog = Blog::with('user')->where('user_id', $user->id)->orderBy('created_at', 'desc')->where('status', 'active')->paginate(6);
        return view('blog.viewOwn', ['blogs'=> $blog]);

    }
}
