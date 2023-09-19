<x-app-layout>
    <x-slot name="header">
        <b class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }}--}}
            Hi ...
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
            <div class="py-12">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-center bg-white w-[400px] h-[300px] overflow-hidden shadow-xl sm:rounded-lg">

                        <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                
                                


                                <div class="mb-6">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="image">Add multiple image</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="image_help" name="image" id="image" type="file">

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