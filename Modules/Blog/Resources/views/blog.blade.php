@extends('blog::layouts.master')

@section('content')
    
    @if(session('wrong'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 " role="alert">

        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{session('wrong')}}</span>
        </div>

    </div>
    @endif
    @if(session('message'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 " role="alert">

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{session('message')}}</span>
        </div>

    </div>
    @endif


    @if(count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 " role="alert">

        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{$error}}</span>
        </div>

    </div>
    @endforeach

    @endif


    <div class="grid grid-cols-6 gap-4">

        <div class="col-span-3 gap-4">

            <div class="grid gap-4">

                <div class="py-5">

                    <div class="bg-white overflow-hidden sm:rounded-lg">


                        <div class="p-4 bg-white border-b border-gray-200">
        
                            <table>
                            
                                <thead>
                                    
                                    <th>
                                        <td>#.</td>
                                        <td>Title.</td>
                                        <td>Status.</td>
                                        <td>Created date</td>
                                        <td>Updated date</td>
                                        <td>Actions.</td>
                                    </th>
                                    
                                </thead>
                            
                                    @if(count($members)>0)
                                    
                                    @foreach ($members as $value)
                                        
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->blog_name }}</td>
                                            <td>{{ $value->status }}</td>
                                            <td>{{ $value->date_created }}.</td>
                                            <td>{{ $value->date_updated }}.</td>
                                            <td>
                                                <a style="font-size:21px;font-weight:bold;color:rgb(201 133 9);" href="{{'blogEdit/'.$value['id']}}"><i class="far fa-edit"></i></a>
                                                <a style="font-size:21px;font-weight:bold;color:red;" href="{{'blogDelete/'.$value['id']}}"><i class=" far fa-trash-alt"></i></a>
                                            </td>
                                        
                                        </tr>
                                    @endforeach
                                    
                                    @endif
                                    
                            </table>
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
