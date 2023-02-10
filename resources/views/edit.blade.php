<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 w-full">

                    <form action="{{route('update-post', $post->id )}}" method="post"> @csrf
                        <p>
                            <Input class="w-100 m-4 p-4" type ="text" name="title" value="{{$post->title}}" /> </br>
                            <textarea name="content" id="" cols="30" rows="10">
                                {{$post->content}}
                            </textarea> </br>
                            <button class="m-4 p-4 text-white bg-black rounded" type="submit">Update Post</button>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
