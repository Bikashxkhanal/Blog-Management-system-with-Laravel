<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white rounded-2xl shadow-lg overflow-hidden">
        {{-- Blog Image --}}
        @if($blog->img_path)
            <div class="w-full py-6 flex justify-center">
                <img src="{{ asset('uploads/blog_imgs/' . $blog->img_path) }}" 
                     alt="Blog Image" 
                     class="w-full h-auto rounded-lg max-h-[600px]">
            </div>
        @endif

        {{-- Blog Content --}}
        <div class="p-6 flex flex-col gap-4">
            {{-- Metadata --}}
            <div class="flex items-center justify-between text-gray-500 text-sm">
                <span>By {{ $blog->user?->name ?? 'Unknown Author' }}</span>
                <span>{{ $blog->created_at->format('M d, Y H:i') }}</span>
            </div>

            {{-- Title --}}
            <h1 class="text-3xl font-bold text-gray-900">{{ $blog->title }}</h1>

            {{-- Description --}}
            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $blog->discription }}</p>

            {{-- Action Buttons --}}
            <div class="flex flex-wrap gap-3 mt-6">
                <a href="{{ route('blog.index') }}" 
                   class="px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white font-semibold rounded-lg transition">
                    Cancel
                </a>

                @if(auth()->check() && auth()->id() === $blog->user_id)
                    <a href="{{ route('blog.edit', $blog) }}" 
                       class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                        Edit
                    </a>

                    <form action="{{ route('blog.destroy', $blog) }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white font-semibold rounded-lg transition">
                            Delete
                        </button>
                    </form>

                @elseif(auth()->check() && auth()->user()->role === 'admin')
                    <form action="{{ route('blog.destroy', $blog) }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white font-semibold rounded-lg transition">
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
