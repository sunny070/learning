<x-app-layout>
    <x-slot name="header">
        <b class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }}--}}
            Hi ...
            <div class="flex justify-end">
            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
            <div class=" bg-white w-[1000px] overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                  @if(session('success'))
                                      <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3  font-medium">
                    {{session('success')}}
                    </div>
                      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                  </div>
                  @endif
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">




                      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                          <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                              <tr>
                                <th scope="col" class="px-6 py-4">ID</th>
                                <th scope="col" class="px-6 py-4">User ID</th>
                                <th scope="col" class="px-6 py-4">Category</th>
                                <th scope="col" class="px-6 py-4">Created AT</th>
                              </tr>
                            </thead>
                            @foreach($categories as $s)
                            <tbody>
                              <td scope="col" class="px-6 py-4">{{$s->id}}</td>
                              <td scope="col" class="px-6 py-4">{{$s->user_id}}</td>
                              <td scope="col" class="px-6 py-4">{{$s->category}}</td>
                              <td scope="col" class="px-6 py-4">
                              @if($s->created_at == NULL)
                                <span class="text-color-red">None</span>
                              @else  
                              {{$s->created_at->diffForHumans()}}
                              @endif</td>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      <div>

                      </div>
                      </div>
                    </div>
                </div>

            </div>

            <div class="py-12">

        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white w-[300px] overflow-hidden shadow-xl sm:rounded-lg">
            <form action="{{route('store.category')}}" method="POST">  
              @csrf
            <label class="flex" >Category</label>
                <input name="category" class="rounded" type="text">
                @error('category')
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
  <span class="font-medium">{{$message}}
</div>
                  
                @enderror
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                          Submit
                </button>
            </form>
            </div>

          </div>


            </div>
        </div>
    </div>
</x-app-layout>
