<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Staff Details') }}
        </h2>

    </x-slot>
    <div class="grid grid-cols-6 gap-4">

        <div class="col-span-3 gap-4">
            <div class="py-5">


                <div class="bg-white overflow-hidden sm:rounded-lg">


                    <div class="p-4 bg-white border-b border-gray-200">

                        <form method="POST" action="{{ url('admin/staffupdate') }}">
                            @csrf
                            <div>

                                <input type="hidden" name="id" required value="{{$data['id']}}" />

                            </div>
                            <div class=" mt-4">
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$data['name']}}" required autofocus />
                            </div>
                            <div class=" mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$data['email']}}" required autofocus />
                            </div>
                            <div class=" mt-4">
                                <x-label for="phone" :value="__('Phone no.')" />

                                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" value="{{$data['phone']}}" required autofocus />
                            </div>
                            <div class=" mt-4">
                                <x-label for="password" :value="__('password')" />

                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus />
                            </div>
                            <div class=" mt-4">

                                <x-label for="role" :value="__('Role')" />

                                <select name="role" style="width:cover;">
                                    <option selected value="{{$data['role']}}">--Choose--</option>
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
    </div>
    @include('admin.layouts.sidebar')
</x-admin-layout>