<x-app-layout>
    <div class="mt-5 py-5 px-2 text-center flex flex-col justify-center 
    items-center border
    ">
        <div>{{ $blog->created_at }}</div>
        <div>
            {{$blog->title}}
        </div>
        <div>
            {{ $blog->discription }}
        </div>
        <div class="flex flex-row gap-4">
            <a class="px-3 py-0.5 bg-gray-500 hover:bg-gray-700 text-white border border-gray-700 rounded-md" href="{{ route('blog.index') }}">Cancel</a>
            <form class="px-3 py-0.5 bg-red-500 hover:bg-red-700 text-white border border-red-700 rounded-md"  action="{{ route('blog.destroy', $blog) }}" method="post">
                @csrf
                @method('delete')
                <button  ">Delete</button>
            </form>
        </div>

    </div>
</x-app-layout>