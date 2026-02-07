<x-app-layout>
    <div>
    @session('message')
    {{  session('message') }}
    @endsession
    </div>
    <div class="mx-10 flex flex-col gap-2">
       @if ($blogs->isEmpty())
       <div class="text-center">
        No todos to show!
       </div>
       
       @endif
        @foreach ($blogs as $blog )
        <div class="px-2 pl-10 py-1 text-center flex flex-row flex-wrap flex-star   t relative 
        gap-20 items-center bg-green-300 border rounded-xl border-green-300">
           
                <input type="checkbox" name="complete" >
              
            <div class= " px-2 py-1  ">

                {{ 
               Str::words($blog->title, 1) 
                 }}
            </div>
            <div>
               {{ Str::words($blog->discription, 4) }}
            </div>

            <div class="absolute top-center right-5">
                <a href="{{ route('blog.show', $blog)}}">View</a>
            </div>
           
        </div>
        @endforeach 
       
        
    </div>
    <a href="{{  route('todo.create') }}" class="absolute right-10 top-[80%] bg-gray-500 border-2 px-4 py-2 border-gray-700 rounded-lg hover:bg-gray-800 hover:text-white shadow-2xl z-10">
        + New Todo
    </a>
    <div class=" gap-10 mr-10 mb-4 fixed bottom-0 left-10 right-10 ">{{ $blogs->links() }}</div>
</x-app-layout>
