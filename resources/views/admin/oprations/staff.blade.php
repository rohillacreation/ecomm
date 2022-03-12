<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff') }}
        </h2>

    </x-slot>
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

        <div class="py-5">


            <div class="bg-white overflow-hidden sm:rounded-lg">


                <div class="p-4 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('admin.staff') }}" enctype="multipart/form-data">
                        @csrf

                        <div class=" mt-4">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <div class=" mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <div class=" mt-4">
                            <x-label for="phone" :value="__('Phone no.')" />

                            <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus />
                        </div>
                        <div class=" mt-4">
                            <x-label for="password" :value="__('password')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus />
                        </div>
                        <div class=" mt-4">

                            <x-label for="role" :value="__('Role')" />

                            <select :value="old('role')" name="role" style="width:cover;">
                                <option selected value="">--Choose--</option>
                                <option value="admin">Admin</option>
                                <option value="superviser">Superviser</option>
                                <option value="employee">Employee</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Upload') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="grid gap-4">

        <div class="py-5">


            <div class="bg-white overflow-hidden sm:rounded-lg">


                <div class="p-4 bg-white border-b border-gray-200">
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 " role="alert">

                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">
                                <h3>Alert : </h3>
                                Plese make sure if you update or delete an admin credentials so, admin will be in trouble at login time.
                            </span>
                        </div>

                    </div>



                    <table class="base border-2 border-gray-500">
                        <tr class="border-b-2 bottom-gray-200 ">
                            <th style="width: 10%;">ID</th>
                            <th style="width: 15%;">NAME</th>
                            <th style="width: 15%;">EMAIL</th>
                            <th style="width: 15%;">PHONE NO.</th>
                            <th style="width: 15%;">ROLE</th>
                            <th style="width: 15%;">ACTION</th>
                        </tr>
                        @foreach($members as $member) <div class=" col-span-1 gap-4">
                            <tr>
                                <td style="height:45px;text-align:center;">{{$member['id']}}</td>
                                <td style="height:45px;text-align:center;">{{$member['name']}}</td>
                                <td style="height:45px;text-align:center;">{{$member['email']}}</td>
                                <td style="height:45px;text-align:center;">{{$member['phone']}}</td>
                                <td style="height:45px;text-align:center;">{{$member['role']}}</td>
                                <td style="justify-content:space-beetween;height:45px;text-align:center;">
                                    <a style="font-size:21px;font-weight:bold;color:rgb(201 133 9);" href="{{'staffEdit/'.$member['id']}}"><i class="far fa-edit"></i></a>
                                    <a style="font-size:21px;font-weight:bold;color:red;" href="{{'staffDelete/'.$member['id']}}"><i class=" far fa-trash-alt"></i></a>
                                </td>
                            </tr>


                            @endforeach

                    </table>
                    <span>{{ $members->links()}}</span>


                </div>
            </div>
        </div>
    </div>



    @include('admin.layouts.sidebar')
</x-admin-layout>