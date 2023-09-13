<x-app-layout>
    <x-slot name="header">
        <b class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }}--}}
            Update Category

            {{-- <b>{{Auth::user()->name}}</b> --}}
            {{-- <b class="flex justify-end"> Total Users </b> --}}

            {{-- <span class=" flex justify-end">{{count($users)}}</span> --}}
            </h2>
    </x-slot>

    <div class="py-12">
        
           


            </div>

            <div class="py-12">

                <div class="flex justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-center bg-white w-[500px] h-[500px] overflow-hidden shadow-xl sm:rounded-lg">
                        <form action="{{ url('update/category/'.$categories->id) }}" method="POST">
                            @csrf
                            <label class="flex justify-center pb-10">Update Category</label>
                            <input name="category" value="{{ $categories->category }}" class="rounded flex justify-center" type="text">
                            @error('category')
                            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                role="alert">
                                <span class="font-medium">{{$message}}
                            </div>

                            @enderror
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
</x-app-layout>