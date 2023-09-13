<x-app-layout>
    <x-slot name="header">
        <b class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Hi ... <b>{{ Auth::user()->name }}</b>
            <b class="flex justify-end"> Total Users </b>

            <span class=" flex justify-end">{{ count($users) }}</span>
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>

                                        <th scope="col" class="px-6 py-4">ID</th>
                                        <th scope="col" class="px-6 py-4">Name</th>
                                        <th scope="col" class="px-6 py-4">Email</th>
                                        <th scope="col" class="px-6 py-4">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                            @foreach ($users as $user)
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $user->id }} </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>



                                        </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
