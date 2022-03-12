@extends('blog::layouts.master')

@section('content')

    @if(session('wrong'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 " role="alert">

        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{session('wrong')}}</span>
        </div>

    </div>
    @endif

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


    <div class="py-5">

        <div class="bg-white overflow-hidden sm:rounded-lg">


            <div class="p-4 bg-white border-b border-gray-200">
                
                <form method="POST" action="{{ route('admin.update_blog') }}" enctype="multipart/form-data">
                    
                    @csrf
                    
                    <input name="id" type="hidden" value="{{$value->id}}">
                    
                    <!-- Blog Name -->
                    <div>
                        <x-label for="name" :value="__('Blog Name')" />
                        
                        <x-input id="name" class="block mt-1 w-full" type="text" name="blog_name" value="{{$value->blog_name}}" required autofocus />
                    </div>
                    
                    <!-- Blog status -->
                    
                    <label for="status">
                        Blog status:
                    </label>
                    
                    <input id="blog_status" type="checkbox" checked>
                    <input type="text" id="show_status" value="{{$value->status}}" disabled>
                    
                    
                    <!-- Blog content -->
                    
                    <label for="name" class="block font-medium text-sm text-gray-700">
                        
                        Blog Content
                        
                    </label>
                    
                    <textarea id="body" name="body" required>
                        {{$value->body}}
                    </textarea>
                    
                    <input name="status" id="status" type="hidden" value="{{$value->status}}">
                    
                    <div class="py-2 items-end">
                        
                        <x-button class="ml-4">
                            {{ __('Upload') }}
                        </x-button>
                        
                    </div>
                    
                    
                </form>
                
            </div>
            
        </div>
      
        
        <script>

        CKEDITOR.replace( 'body' ,{

                filebrowserUploadUrl:"{{route('admin.image_upload',['_token'=>csrf_token()])}}",
                filebrowserUploadMethod:"form"
            });

            $(document).ready(function(){

                
            $('#blog_status').click(function() {

            if ($('#blog_status').is(':checked')) {
                
                $(' #show_status').val('published');
                $(' #status').val('published');
            } else {
                $(' #show_status').val('unpublished');
                $(' #status').val('unpublished');
            }

            });
        });
            
            
            
                
        </script>
 @endsection