<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <div class="flex-1">
                            <h3>Add Posts</h3>
                            <form action="{{ route('add-post') }}" method="post">
                                @csrf
                                <p>
                                    <input name="title" type="text" placeholder="Title" value="{{old('title')}}">
                                </p>
                                <p>
                                <textarea name="content" cols="30" rows="10">{{old('content')}}</textarea>
                                </p>
                                <p>
                                <button type="submit">Add Post</button>
                                </p>
                            </form>
                        </div>
                        <div class="flex-1">
                            <h3>All Posts</h3>
                            <ul>
                                @foreach($posts as $post)
                                <li><a href=""></a>{{$post->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
