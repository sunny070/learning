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
      <div class=" bg-white w-[1000px] overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex flex-col">
          @if(session('success'))
          <div id="alert-1"
            class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 20 20">
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
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
            </button>
          </div>
          @endif
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">




            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <h2 class="flex justify-center">Category List</h2>
                <table class="min-w-full text-left text-sm font-light">
                  <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                      <th scope="col" class="px-6 py-4">SlNo.</th>

                      {{-- <th scope="col" class="px-6 py-4">ID</th> --}}
                      <th scope="col" class="px-6 py-4">Category</th>
                      <th scope="col" class="px-6 py-4">User ID</th>
                      <th scope="col" class="px-6 py-4">Created AT</th>
                      <th scope="col" class="px-6 py-4">Action</th>

                    </tr>
                  </thead>
                  {{-- @php($i =1) --}}
                  @foreach($categories as $s)
                  <tbody>
                    <td scope="col" class="px-6 py-4">{{$categories->firstItem()+$loop->index}}</td>

                    {{-- <td scope="col" class="px-6 py-4">{{$s->id}}</td> --}}
                    <td scope="col" class="px-6 py-4">{{$s->category}}</td>
                    {{-- while using the eloquent orm --}}
                    <td scope="col" class="px-6 py-4">{{$s->user->name}}</td>

                    {{-- while using the query --}}
                    {{-- <td scope="col" class="px-6 py-4">{{$s->name}}</td> --}}

                    <td scope="col" class="px-6 py-4">
                      @if($s->created_at == NULL)
                      <span class="text-orange-700">No_Data_Set</span>
                      @else
                      {{-- While using the query Builder--}}
                      {{Carbon\Carbon::parse($s->created_at)->diffForHumans()}}
                      {{-- with Eliquent ORM --}}
                      {{-- {{$s->created_at->diffForHumans()}} --}}

                      @endif
                    </td>
                    <td class="flex justify-center">
                      <a href="{{ url('edit/category/'.$s->id) }}" class="">
                        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="text-emerald-700 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                          </svg></span>
                      </a>
                      <a href="{{ url('softdelete/category/'.$s->id) }}" class="">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-rose-400 w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                          </svg>
                        </span>
                      </a>
                    </td>
                    @endforeach
                  </tbody>
                </table>
                {{ $categories->links() }}
              </div>
              <div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="py-12">

        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class=" bg-white w-[400px] h-[300px] overflow-hidden shadow-xl sm:rounded-lg">
            <form action="{{route('store.category')}}" method="POST">
              @csrf
              <label class="flex justify-center pb-10">Category</label>
              <input name="category" class="rounded" type="text">
              @error('category')
              <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
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


    {{-- Trash Part --}}
    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8 pt-10">
      <div class=" bg-white w-[1000px] overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex flex-col">

          <div class="flex justify-start overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <h2 class="flex justify-center">Trash List</h2>
                <table class="min-w-full text-left text-sm font-light">
                  <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                      <th scope="col" class="px-6 py-4">SlNo.</th>

                      {{-- <th scope="col" class="px-6 py-4">ID</th> --}}
                      <th scope="col" class="px-6 py-4">Category</th>
                      <th scope="col" class="px-6 py-4">User ID</th>
                      <th scope="col" class="px-6 py-4">Created AT</th>
                      <th scope="col" class="px-6 py-4">Action</th>

                    </tr>
                  </thead>
                  {{-- @php($i =1) --}}
                  @foreach($trachCat as $s)
                  <tbody>
                    <td scope="col" class="px-6 py-4">{{$categories->firstItem()+$loop->index}}</td>

                    {{-- <td scope="col" class="px-6 py-4">{{$s->id}}</td> --}}
                    <td scope="col" class="px-6 py-4">{{$s->category}}</td>
                    {{-- while using the eloquent orm --}}
                    <td scope="col" class="px-6 py-4">{{$s->user->name}}</td>

                    {{-- while using the query --}}
                    {{-- <td scope="col" class="px-6 py-4">{{$s->name}}</td> --}}

                    <td scope="col" class="px-6 py-4">
                      @if($s->created_at == NULL)
                      <span class="text-orange-700">No_Data_Set</span>
                      @else
                      {{-- While using the query Builder--}}
                      {{Carbon\Carbon::parse($s->created_at)->diffForHumans()}}
                      {{-- with Eliquent ORM --}}
                      {{-- {{$s->created_at->diffForHumans()}} --}}

                      @endif
                    </td>
                    <td class="flex justify-center">
                      <a href="{{ url('restore/category/'.$s->id) }}" class="">
                        <span><svg xmlns="http://www.w3.org/2000/svg"  class="text-emerald-400 w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                        </svg>
                        </span>
                      </a>
                      <a href="{{ url('pdelete/category/'.$s->id) }}" class="">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="text-rose-500 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>
                        </span>
                      </a>
                    </td>
                    @endforeach
                  </tbody>
                </table>
                {{ $trachCat->links() }}
              </div>
              <div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
{{-- End Trash --}}
  </div>
</x-app-layout>