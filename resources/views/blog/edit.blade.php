<!-- resources/views/blog/edit.blade.php -->
<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Edit Blog</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form to Update Blog -->
        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block font-medium mb-2">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title', $blog->title) }}"
                    class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200"
                    placeholder="Enter blog title">
            </div>

            <!-- Discription -->
            <div class="mb-4">
                <label for="discription" class="block font-medium mb-2">Discription</label>
                <textarea 
                    name="discription" 
                    id="discription" 
                    rows="5"
                    class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200"
                    placeholder="Write your blog content here">{{ old('discription', $blog->discription) }}</textarea>
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block font-medium mb-2">Blog Image</label>
                <input 
                    type="file" 
                    name="blog_img" 
                    id="image" 
                    class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200"
                    accept="image/*">
                @if($blog->img_path)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/blog_imgs/' . $blog->img_path) }}" alt="Current Image" class="h-32 w-auto rounded">
                    </div>
                @endif
            </div>

            <!-- Update Button -->
            <button 
                type="submit" 
                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-800 transition">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
