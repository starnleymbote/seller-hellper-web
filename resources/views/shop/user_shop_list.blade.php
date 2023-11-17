@extends('layouts.main')

@section('content')

    <div class="px-8 center">
        <h3 class="mb-2  font-bold text-grey-100 text-lg hover:text-2xl ">{{$owners_name ->first_name}} {{$owners_name ->last_name}} Shops</h3>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Profile Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>

            

                @if (count($shops) > 0)
                
                    @foreach ($shops as $shop)
                            
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$shop ->image}}
                            </th>
                            <td class="px-6 py-4">
                                {{$shop ->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$shop ->description}}
                            </td>
                            <td class="px-6 py-4">
                                {{$shop ->description}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        
                    @endforeach
                
                @else
                    
                    <tr>
                        <td class="justify-items-center w-full py-6" colspan="4">
                            
                            <div class="grid  justify-items-center">
                                
                                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <span class="text-blue-700"> {{ $owners_name ->first_name }} </span> Has No Shops At The Moment</h5>

                                </a>

                            </div>
                        
                        </td>
                    </tr>
                        
                @endif
                
            </tbody>
        </table>
    </div>

@endSection