<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">
        {{-- Blog Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($blogs as $blog)
                @if ($blog->status === 'active')
                    <a href="{{ route('blog.show', $blog->id) }}" class="block group">
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                            
                            {{-- Blog Image --}}
                            @if($blog->img_path)
                                <div class="w-full h-48 overflow-hidden">
                                    <img src="{{ asset('uploads/blog_imgs/' . $blog->img_path) }}" 
                                         alt="{{ $blog->title }}" 
                                         class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105">
                                </div>
                            @endif

                            {{-- Blog Content --}}
                            <div class="p-5 flex flex-col flex-1">
                                {{-- Title --}}
                                <h2 class="text-lg font-bold text-gray-900 mb-2">{{ $blog->title }}</h2>

                                {{-- Description --}}
                                <p class="text-gray-700 text-sm leading-relaxed mb-4">
                                    {{ Str::limit($blog->discription, 120) }}
                                    @if(Str::length($blog->discription) > 120)
                                        <span class="text-purple-600 font-semibold">... Read More</span>
                                    @endif
                                </p>

                                {{-- Author and Date --}}
                                <div class="mt-auto flex items-center justify-between text-gray-500 text-xs">
                                    <span>{{ $blog->user?->name ?? 'Unknown Author' }}</span>
                                    <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>

                        </div>
                    </a>
                @endif
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-10 flex justify-center">
            {{ $blogs->links() }}
        </div>
    </div>
</x-app-layout>
