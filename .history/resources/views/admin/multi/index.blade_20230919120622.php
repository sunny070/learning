<x-app-layout>
    <x-slot name="header">
        <b class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Multi Picture') }}
            {{-- Hi ... --}}
            <div class="flex justify-end">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="{{ route('all.category.add') }}" class=""> Add</a>

                </button>
            </div>
            {{-- <b>{{Auth::user()->name}}</b> --}}
            {{-- <b class="flex justify-end"> Total Users </b> --}}

            {{-- <span class=" flex justify-end">{{count($users)}}</span> --}}
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white w-[1000px] overflow-hidden shadow-xl sm:rounded-lg">
                
                    @if(session('success'))
                    <div id="alert-1"
                        class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3  font-medium">
                            {{session('success')}}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    @endif
                    {{-- <div class="overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
                        <h2 class="flex justify-center">Brand List</h2>
                        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                              
                            @foreach($images as $img)
                                        <img src="{{ asset($img->image) }}" style="height:100px; width:100px"
                                            alt="Brand_Img">
                                @endforeach
                        </div>
                    </div>
                

            </div>
            <div class="py-12">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="flex justify-center bg-white w-[400px] h-[300px] overflow-hidden shadow-xl sm:rounded-lg">

                        <form action="{{route('store.multi_img')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">




                                <div class="mb-6">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="image">Add multiple image</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="image_help" multiple="" name="image[]" id="image" type="file">

                                </div>
                                @error('image')
                                <div class="p-1 mb-1 text-sm text-red-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                    role="alert">
                                    <span class="font-medium">{{$message}}
                                </div>
                                @enderror
                            </div>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Image
                            </button>
                        </form>
                    </div>

                </div>


            </div>
        </div>



    </div>
</x-app-layout>